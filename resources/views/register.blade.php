<x-layout page="Registre-se">
    <x-slot:btn>
        {{-- ref ao name da rota, e não a rota em si --}}
        <a href="{{ route('login') }}" class="btn btn-primary">
            Já possui conta? Faça login
        </a>
    </x-slot:btn>
    <section id="task_section">
        <h1>Registre-se</h1>
        <form method="POST" action="{{ route('register_action') }}">
            {{-- precisamos do token csrf para que a próxima página valide que o form foi de fato enviado pelo próprio app, e não um envio externo --}}
            {{-- para isso, basta inserirmos o @csrf conforme abaixo. Caso contrário teremos erro de página expirada --}}
            @csrf

            <x-validate_error/>

            <x-form.text_input name="name" placeholder="Digite seu nome" label="Nome"
                required="required" />
                
                {{-- Mostrando erros de forma individual nos campos --}}
                {{-- <li>
                    @error('email')
                    {{$message}}
                    @enderror
                </li> --}}
            <x-form.text_input type="email" name="email" placeholder="Seu melhor email"
                label="Email" required="required" />
                


            <x-form.text_input type="password" name="password" placeholder="Digite sua senha"
                label="Senha" required="required" />

            <x-form.text_input type="password" name="password_confirmation"
                placeholder="Confirme sua senha" label="Confirmação de senha" required="required" />

            <x-form.form_button resetTxt="Limpar" submitTxt="Registrar-se" />

        </form>
    </section>
</x-layout>
