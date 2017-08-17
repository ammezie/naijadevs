<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Job;
use App\Models\JobType;
use App\Models\Category;
use App\Models\Location;
use App\Events\JobCreated;
use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;

class JobsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'filterJobs']);
    }

    public function index()
    {
        $jobs = Job::getOpenJobs()->latest()->paginate(25);
        $jobTypes = JobType::getAll();
        $categories = Category::getAll();
        $locations = Location::getAll();

        return view('jobs.index', compact('jobs', 'jobTypes', 'categories', 'locations'));
    }

    /**
     * Show form for create job
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobTypes = JobType::getAll();
        $locations = Location::getAll();
        $categories = Category::getAll();

        return view('jobs.create', compact('jobTypes', 'locations', 'categories'));
    }

    /**
     * Handle the actual persist of job to database
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        $attributes = [
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'apply' => $request->apply,
            'apply_url' => $request->apply_url,
            'apply_email' => $request->apply_email,
            'apply_email_subject' => $request->apply_email_subject,
            'type_id' => $request->type_id,
            'category_id' => $request->category_id,
            'location_id' => $request->is_remote ? null : $request->location_id,
            'salary' => $request->salary,
            'is_remote' => $request->has('is_remote') ?? 0,
            'closes_at' => Carbon::now()->addDays(60),
        ];

        // Post job and fire event
        event(new JobCreated($job = Job::createJob($attributes)));

        return redirect($job->path());
    }

    /**
     * Show a specified job
     *
     * @param  Job    $job [description]
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    /**
     * Show form to edit a specified job
     *
     * @param  Job $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        // Can the currently authenticated user edit this job
        $this->authorize('update', $job);

        $jobTypes = JobType::getAll();
        $locations = Location::getAll();
        $categories = Category::getAll();

        return view('jobs.edit', compact('job', 'jobTypes', 'locations', 'categories'));
    }

    /**
     * Update a specified job
     *
     * @param  JobRequest $request
     * @param  Job $job
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request, Job $job)
    {
        // Can the currently authenticated user edit this job
        $this->authorize('update', $job);
        
        $attributes = [
            'title' => $request->title,
            'description' => $request->description,
            'apply' => $request->apply,
            'apply_url' => $request->apply_url,
            'apply_email' => $request->apply_email,
            'apply_email_subject' => $request->apply_email_subject,
            'type_id' => $request->type_id,
            'category_id' => $request->category_id,
            'location_id' => $request->is_remote ? null : $request->location_id,
            'salary' => $request->salary,
            'is_remote' => $request->has('is_remote') ?? 0,
        ];

        $job->updateJob($attributes);

        return redirect('/my-jobs')->with('success', 'Job updated!');
    }

    /**
     * Close the specified job
     *
     * @param  Job   $job
     * @return Response
     */
    public function close(Job $job)
    {
        // Can the currently authenticated user edit this job
        $this->authorize('update', $job);

        $job->is_closed = 1;
        $job->save();

        return back()->with('success', 'Job closed!');
    }

    /**
     * Filter jobs
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function filterJobs(Request $request)
    {
        $jobQuery = (new Job)->newQuery()
                            ->where('is_closed', 0)
                            ->where('closes_at', '>', Carbon::now())
                            ->latest();

        if ($request->has('category')) {
            $category = Category::where('slug', $request->category)->firstOrFail();

            $jobQuery->where('category_id', $category->id);
        }

        if ($request->has('type')) {
            $type = JobType::where('slug', $request->type)->firstOrFail();

            $jobQuery->where('type_id', $type->id);
        }

        if ($request->has('location')) {
            $location = Location::where('slug', $request->location)->firstOrFail();

            $jobQuery->where('location_id', $location->id);
        }

        if ($request->has('is_remote')) {
            $jobQuery->where('is_remote', 1);
        }

        $jobs = $jobQuery->with('creator', 'type', 'category', 'location')->paginate(25);
        $jobTypes = JobType::getAll();
        $categories = Category::getAll();
        $locations = Location::getAll();

        return view('jobs.filtered', compact('jobs', 'jobTypes', 'categories', 'locations'));
    }
}
