<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    /**
     * About page
     *
     * @return Response
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Pricing page
     *
     * @return Response
     */
    public function pricing()
    {
        return view('pages.pricing');
    }

    /**
     * Terms page
     *
     * @return Response
     */
    public function terms()
    {
        return view('pages.terms');
    }

    /**
     * Privacy page
     * @return Response
     */
    public function privacy()
    {
        return view('pages.privacy');
    }

    /**
     * FAQ page
     * @return Response
     */
    public function faqs()
    {
        return view('pages.faqs');
    }
}
