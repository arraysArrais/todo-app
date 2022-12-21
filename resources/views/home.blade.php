<x-layout>

    <x-slot:btn>
        <a href="{{route('task.create')}}" class="btn btn-primary">
            Criar Tarefa
        </a>
    </x-slot:btn>

    <section class="graph">
        <div class="graph_header">
            <h2>Progresso do dia</h2>
            <div class="graph_header-line"></div>
            <div class="graph_header-date">
                <img src="/assets/images/icon-prev.png">
                13 de Dez
                <img src="/assets/images/icon-next.png">
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
            <select class="list_header-select">
                <option value="1">Todas as tarefas</option>
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
</x-layout>
