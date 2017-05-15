<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Get jobs created by the currently authenticated user
     *
     * @return \Illuminate\Http\Response
     */
    public function myJobs()
    {
        $jobs = Job::userJobs(auth()->id());

        return view('users.jobs', compact('jobs'));
    }
}
