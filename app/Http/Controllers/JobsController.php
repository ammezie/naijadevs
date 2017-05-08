<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobType;
use App\Models\Category;
use App\Models\Location;
use App\Http\Requests\JobRequest;

class JobsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $jobs = Job::all();

        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show form for create job
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create', [
            'jobTypes' => JobType::all(),
            'locations' => Location::all(),
            'categories' => Category::all(),
        ]);
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
        ];

        $job = Job::createJob($attributes);

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
        // $job = Job::with('type')->findOrFail($job);
        // dd($job);
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

        return view('jobs.edit', [
            'job' => $job,
            'jobTypes' => JobType::all(),
            'locations' => Location::all(),
            'categories' => Category::all(),
        ]);
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

        return redirect($job->path());
    }
}
