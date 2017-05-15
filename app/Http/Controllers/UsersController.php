<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserProfileRequest;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        //
    }

    /**
     * Persist company details changes to database
     *
     * @return Illuminate\Http\Response
     */
    public function updateCompany()
    {
       //
    }
}
