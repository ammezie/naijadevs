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
        $this->middleware('auth')->except('index');
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
        $jobTypes = JobType::all();
        $locations = Location::all();
        $categories = Category::all();

        return view('jobs.create', compact('jobTypes', 'locations', 'categories'));
    }

    /**
     * Handle the actual persist of job to database
     *
     * @param  Request $request
     * @return [type]           [description]
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
            'type_id' => $request->type,
            'category_id' => $request->category,
            'location_id' => $request->is_remote ? null : $request->location,
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
     * @return [type]      [description]
     */
    public function show(Job $job)
    {
        return $job;
    }
}
