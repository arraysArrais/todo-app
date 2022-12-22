<x-layout>
    {{-- @php
        dd($task->due_date);
    @endphp --}}
    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Editar Tarefa</h1>
        <form method="POST" action="{{ route('task.edit_action') }}">
            {{-- precisamos do token csrf para que a próxima página valide que o form foi de fato enviado pelo próprio app, e não um envio externo --}}
            {{-- para isso, basta inserirmos o @csrf conforme abaixo. Caso contrário teremos erro de página expirada --}}
            @csrf

            {{-- gambi pra pegar o ID da task e passar para task.edit_action --}}
            <input type="hidden" name="id" value="{{$task->id}}"/>

            <x-form.text_input id="title" name="title" placeholder="Digite o título da task" label="Título"
                required="required" value="{{ $task->title }}" />

            <x-form.text_input type="datetime-local" id="due_date" name="due_date" label="Data de realização"
                required="required" value="{{$task->due_date}}" />

            <x-form.select_input label="Categoria" name="category_id" required="required">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == $task->category_id) selected @endif>
                        {{ $category->title }}</option>
                @endforeach
            </x-form.select_input>


            <x-form.textarea_input label="Descrição da tarefa" name="description"
                placeholder="Digite uma descrição para sua tarefa" value="{{$task->description}}"/>


            {{-- <div class="inputArea">
                <button type="submit" class="btn btn-primary">Criar tarefa</button>
            </div> --}}

            {{-- <div class="buttons">
                <x-form.button type="submit" class="btn btn-primary">Criar tarefa</x-form.button>
                <x-form.button type="reset" class="btn">Limpar</x-form.button>
            </div> --}}

            <x-form.form_button resetTxt="Resetar" submitTxt="Atualizar tarefa"/>

        </form>
    </section>
</x-layout>
