<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $todos = Todo::where('public', true)->get();

        return view('dashboard', compact('todos'));
    }
}
