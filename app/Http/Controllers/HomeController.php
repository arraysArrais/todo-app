<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $r)
    {

        $tasks = Task::all()->take(4);
        $authUser = Auth::user();

        return view('home', [
            'tasks' => $tasks,
            'authUser' => $authUser 
        ]);
    }
}
