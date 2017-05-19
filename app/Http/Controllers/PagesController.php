<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * About page
     *
     * @return [type] [description]
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Pricing page
     *
     * @return [type] [description]
     */
    public function pricing()
    {
        return view('pages.pricing');
    }
}
