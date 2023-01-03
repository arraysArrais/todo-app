
        
            <div class="task {{$data['is_done'] ? 'task_done' : 'task_pending'}}">
                <div class="title">
                    <input type="checkbox" onchange="taskUpdate(this)" data-id="{{$data['id']}}"
                    @if ($data && $data['is_done']==true)
                        checked
                    @endif
                    >
                    <div class="task_title">{{$data['title'] ?? ''}}</div>
                </div>
                <div class="priority">
                    {{-- {{$data['is_done'] ? 'sphere_undone' : 'sphere'}} --}}
                <div class="sphere"></div>
                    <div>{{$data['category']->title ?? ''}}</div>
                </div>
                <div class="actions">
                    {{-- passando id para o botão de edição --}}
                    {{-- e passando parâmetro id via querystring --}}
                    {{-- podemos passar quantos parâmetros quisermos via querystring, basta adicioná-los no array, conforme fizemos com id --}}
                    <a href="{{route('task.edit', ['id'=> $data['id']])}}">
                        <img src="/assets/images/icon-edit.png">
                    </a>
                    <a href="{{route('task.delete', ['id'=> $data['id']])}}">
                        <img src="/assets/images/icon-delete.png">
                    </a>
                </div>
            </div>