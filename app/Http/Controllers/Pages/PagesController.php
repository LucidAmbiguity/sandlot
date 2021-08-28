<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $title = 'Welcome To Lucid Ambiguity';
        // return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }
    public function about()
    {
        $data = [
            'title' => 'About Page'
        ];
        return view('pages.about')->with($data);
    }

    public function services()
    {
        $data = [
            'title' => 'Services',
            'services' => ['Web Services', 'Programming', 'SEO']
        ];
        return view('pages.services')->with($data);
    }
}
