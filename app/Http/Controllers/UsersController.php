<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Location;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\UserProfileRequest;

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
        $jobs = Job::userJobs(auth()->id())->paginate(25);

        return view('users.jobs', compact('jobs'));
    }

    /**
     * Show form for editing user account details
     *
     * @return \Illuminate\Http\Response
     */
    public function showAccountEditForm()
    {
        return view('users.edit_account');
    }

    /**
     * Persist user account details changes to database
     *
     * @return Illuminate\Http\Response
     */
    public function updateAccount(UserProfileRequest $request)
    {
        $user = auth()->user();

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return back()->with('success', 'Profile updated!');
    }

    /**
     * Show form for editing company details
     *
     * @return \Illuminate\Http\Response
     */
    public function showCompanyEditForm()
    {
        $locations = Location::getAll();

        return view('users.edit_company', compact('locations'));
    }

    /**
     * Persist company details changes to database
     *
     * @return Illuminate\Http\Response
     */
    public function updateCompany(CompanyRequest $request)
    {
        $user = auth()->user();

        $user->company_name = $request->company_name;
        $user->company_website = $request->company_website;
        $user->company_location = $request->company_location;
        $user->company_about = $request->company_about;

        $user->save();

        return back()->with('success', 'Company updated!');
    }
}
