<x-layout>

    <x-slot:btn>
        <a href="{{route('task.create', ['authUserId'=>$authUser->id])}}" class="btn btn-primary">
            Criar Tarefa
        </a>
        <a href="{{route('logout')}}" class="btn btn-primary">
            Logout
        </a>
    </x-slot:btn>

    <section class="graph">
        <div class="graph_header">
            <h2>Progresso do dia - {{$authUser->name}}</h2>
            <div class="graph_header-line"></div>
            <div class="graph_header-date">
                <a href="{{route('home', ['date' => $date_prev_button])}}"><img src="/assets/images/icon-prev.png"></a>
                {{$date_as_string}}
                <a href="{{route('home', ['date' => $date_next_button])}}"><img src="/assets/images/icon-next.png"></a>
            </div>
        </div>
        <div class="graph_header-subtitle"> Tarefas: <b>3/6</b></div>

        <div class="graph-placeholder">
            {{-- <img src="/assets/images/graph.png"> --}}
        </div>

        <div class="tasks_left_footer">
            <img src="/assets/images/icon-info.png">
            <p class="graph_header-tasks_left">Restam 3 tarefas para serem realizadas</p>
        </div>

    </section>
    <section class="list">
        <div class="list-header">
            <select class="list_header-select" onChange="changeTaskStatusFilter(this)">
                <option value="all_task">Todas as Tarefas</option>
                <option value="task_pending">Todas Pendentes</option>
                <option value="task_done">Todas Realizadas</option>
            </select>
        </div>
        <div class="task_list">
            {{-- @php
                $tasks = [
                ['done' => false, 'title' => 'Minha primeira task', 'category' => 'Categoria 1'], 
                ['done' => true, 'title' => 'Minha segunda task', 'category' => 'Categoria 2'], 
                ['done' => false, 
                'title' => 'Minha terceira task', 
                'category' => 'Categoria 3',
                'id' => 1
                ]
            ];
            @endphp --}}

            @foreach ($tasks as $task)
            <x-task :data=$task />
            @endforeach
            {{-- <x-task :data=$tasks[2] /> --}}
        </div>
    </section>

    <script>
        function changeTaskStatusFilter(e){
            
            if(e.value == 'task_pending'){
                showAllTasks()
                document.querySelectorAll('.task_done').forEach(function(element){
                    element.style.display='none';
                })
            } else if (e.value == 'task_done'){
                showAllTasks()
                document.querySelectorAll('.task_pending').forEach(function(element){
                    element.style.display='none';
                })
            }
            else{
                showAllTasks();
            }
        }

        function showAllTasks(){
            document.querySelectorAll('.task').forEach(function(element){
                    element.style.display='flex';
                })
        }
    </script>

    <script>
        async function taskUpdate(element){
            let status = element.checked;
            let taskid = element.dataset.id;
            let url = '{{route('task.update')}}';
            let rawResult = await fetch(url,{
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'accept': 'application/json'
                },
                body: JSON.stringify({status, taskid, _token:'{{csrf_token()}}'})
            });
             result = await rawResult.json();

            if(result.success){
                alert('Tarefa atualizada com sucesso!');
            }
            else{
                element.checked = !status;
            }
        }
    </script>
    
</x-layout>

