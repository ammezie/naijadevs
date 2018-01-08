<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobType;


class JobTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = JobType::all();

        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate form data
        $vaildatedData = $request->validate([
            'name' => 'required',
            'color' => 'required'
        ]);

        $type = new JobType;

        $type->name = $vaildatedData['name'];
        $type->slug = str_slug($vaildatedData['name']);
        $type->color = $vaildatedData['color'];

        // persist to database
        $type->save();

        return redirect()->route('types.index')->with('success', 'Type added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  JobType  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(JobType $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  JobType  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobType $type)
    {
         // validate form data
        $vaildatedData = $request->validate([
            'name' => 'required',
            'color' => 'required'
        ]);

        $type->name = $vaildatedData['name'];
        $type->slug = str_slug($vaildatedData['name']);
        $type->color = $vaildatedData['color'];

        // persist to database
        $type->save();

        return redirect()->route('types.index')->with('success', 'Job type updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  JobType  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobType $type)
    {
        $type->delete();

        return redirect()->back()->with('success', 'Job type deleted!');
    }
}
