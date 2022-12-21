<x-layout>
    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

    <section id="create_task_section">
        <h1>Criar Tarefa</h1>
        <form>
            {{-- <div class="inputArea">
                <label for="title">
                    Título
                </label>
                <input id="title" name="title" placeholder="Digite o título da tarefa" required>
            </div> --}}
            <x-form.text_input id="title" name="title" placeholder="Digite o título da task" label="Título" required="required" />

            {{-- <div class="inputArea">
                <label for="due_date">
                    Data de realização
                </label>
                <input type="date" id="due_date" name="due_date" required>
            </div> --}}
            <x-form.text_input type="date" id="due_date" name="due_date" label="Data de realização" required="required"/>
            
            {{-- <div class="inputArea">
                <label for="category">
                    Categoria
                </label>
                <select id="category" name="category" required>
                    <option selected disabled value="">Selecione a categoria</option>
                    <option value="">Valor qualquer</option>
                </select>  
            </div> --}}

            <x-form.select_input label="Categoria" id="category" name="category" required="required">
                <option value="">Valor qualquer</option>
            </x-form.select_input>

            {{-- <div class="inputArea">
                <label for="description">
                    Descrição
                </label>
                <textarea name="description" placeholder="Digite uma descrição para sua tarefa"></textarea>
            </div> --}}

            <x-form.textarea_input label="Descrição" name="description" placeholder="Digite uma descrição para sua tarefa"/>

        
            {{-- <div class="inputArea">
                <button type="submit" class="btn btn-primary">Criar tarefa</button>
            </div> --}}
            <div class="buttons">
                <x-form.button type="submit" class="btn btn-primary">Criar tarefa</x-form.button>
                <x-form.button type="reset" class="btn">Limpar</x-form.button>
            </div>

            
        </form>
    </section>
</x-layout>
