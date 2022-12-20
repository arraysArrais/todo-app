<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $r){
        $task = Task::all();//->random();
        return $task;
    }
}
