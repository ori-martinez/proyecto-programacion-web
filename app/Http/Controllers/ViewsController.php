<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewsController extends Controller
{
    /**
     * Show the dashboard.
     */
    public function __invoke()
    {
        if (Auth::user()->rol_id === 1) {
            return view('dashboard', ['products' => Product::all()]);
        }
        else {
            return view('dashboard');
        }
    }

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

    /**
     * Show the view with the blog
     */
    public function indexBlog()
    {
        return view('extras.blog');
    }
}
