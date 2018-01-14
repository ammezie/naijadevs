<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $locations = Location::getAll();

        return view('admin.users.edit', compact('user', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->company_name = $request->company_name;
        $user->company_website = $request->company_website;
        $user->company_location = $request->company_location;
        $user->company_about = $request->company_about;

        if ($request->hasFile('company_logo')) {
            $path = $request->company_logo->store('uploads');

            $user->company_logo = $path;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('success', 'User deleted!');
    }
}
