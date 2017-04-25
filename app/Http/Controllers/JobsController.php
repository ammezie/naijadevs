<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $jobs = Job::get();

        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }
    public function store(Request $request)
    {
        $job = Job::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'apply' => $request->apply,
            'type' => $request->type,
            'location' => $request->location,
        ]);

        return redirect('/jobs');
    }

    public function show(Job $job)
    {
        return $job;
    }
}
