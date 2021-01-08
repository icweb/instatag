<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $groups = auth()->user()->groups()->with('hashtags')->orderBy('title')->get();

        return view('dashboard', compact('groups'));
    }
}
