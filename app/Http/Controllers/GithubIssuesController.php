<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GithubIssuesController extends Controller
{
    public function index()
    {
        return view('github-issues.index');
    }
}