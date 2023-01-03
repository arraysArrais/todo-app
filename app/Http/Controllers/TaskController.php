<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
    }

    public function create(Request $r)
    {
        $categorias = Category::all();

        // $data['categories'] = $categorias;
        // return view('tasks.create', $data);

        return view('tasks.create', [
            'categories' => $categorias
        ]);
    }

    public function create_action(Request $r){
        $task = $r->only(['title', 'category_id', 'description', 'due_date']);
        $task['user_id'] = 1;
        $dbTask = Task::create($task);

        return redirect(route('home'));
    }

    public function edit(Request $r)
    {
        //pegando o parâmetro (enviado via querystring na url através do componente da view) pela request
        $id=$r->id;

        $task = Task::find($id);
        $categorias = Category::all();

        if(empty($task)){
            // return redirect(route('home'));
            return 'Task não existe';
        }

        // $task->due_date = Carbon::createFromFormat('Y-m-d H:i:s', $task->due_date)->format('d/m/Y');

        return view('tasks.edit', [
            'task' => $task,
            'categories' => $categorias
        ]);
    }

    public function edit_action(Request $r){

        

        
        //resgatando os dados enviados pela request
        $request_data = $r->only(['title', 'due_date', 'category_id', 'description', 'is_done']);

        //tratando a checkbox da task
        empty($request_data['is_done']) ? $request_data['is_done'] = 0 : $request_data['is_done'] = 1;
        
        //buscando no banco a task em questão
        $task = Task::find($r->id);

        //verificando se a task existe
        if(empty($task)){
            // return redirect(route('home'));
            return 'Task não existe';
        }



        //atualizando registro de task no banco de acordo com os dados recebidos na request
        $task->update($request_data);

        // podemos atualizar cada coluna do banco de forma individual, ex:
        // $task->update([
        //     'title' => 'teste'
        // ]);

        return redirect(route('home'));


    }

    public function delete(Request $r)
    {
        $task = Task::find($r->id);
        if(empty($task)){
            return 'Task não existe';
        }

        //deleta e redireciona para a home
        $task->delete();
        return redirect(route('home'));
    }

    public function update(Request $r){
        // dd($r);
        
        $task = Task::findOrFail($r->taskid);
        $task->is_done = $r->status;
        $task->save();

        return [
            'success' => true
        ];

        
        // dd($task);
    }
}
