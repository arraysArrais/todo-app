<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $r)
    {
        if($r->date){
            $filteredDate = $r->date;
        }
        else{
            $filteredDate = date('Y-m-d');
        }

        // dd($filteredDate);

        $authUser = Auth::user();

        $tasks = Task::whereDate('due_date', $filteredDate)->where('user_id', '=', $authUser->id)->get();
        // dd($tasks);
        

        $carbonDate = Carbon::createFromDate($filteredDate);
        

        return view('home', [
            'tasks' => $tasks,
            'authUser' => $authUser,
            'date_as_string' => $carbonDate->translatedFormat('d'). ' de ' . ucfirst($carbonDate->translatedFormat('M')),
            'date_prev_button' => $carbonDate->addDay(-1)->format('Y-m-d'),
            'date_next_button' => $carbonDate->addDay(2)->format('Y-m-d'), //adicionamos 2 dias, pois quando o código chega na linha 32 $carbon date já recebeu -1 dia, então se colocar +1 vai ser sempre o dia vigente. Por isso adicionamos +2
        ]);
    }
}
