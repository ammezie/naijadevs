<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function show(User $company)
    {
        $jobs = $company->getCompanyJobs()->paginate(25);
        
        return view('companies.show', compact('company', 'jobs'));
    }
}
