<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    /**
     * Show the view with FAQ.
     */
    public function indexHelp()
    {
        return view('extras.help');
    }

    /**
     * Show the view with the terms of use.
     */
    public function indexTerms()
    {
        return view('extras.terms');
    }

    /**
     * Show the view with privacy policies.
     */
    public function indexPolicies()
    {
        return view('extras.policies');
    }

    /**
     * Show the view with contact form.
     */
    public function indexContact()
    {
        return view('extras.contact');
    }
}
