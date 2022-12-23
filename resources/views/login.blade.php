<x-layout page="Login">
    <x-slot:btn>
        <a href="{{route('register')}}" class="btn btn-primary">
            Registre-se
        </a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login_action') }}">
            {{-- precisamos do token csrf para que a próxima página valide que o form foi de fato enviado pelo próprio app, e não um envio externo --}}
            {{-- para isso, basta inserirmos o @csrf conforme abaixo. Caso contrário teremos erro de página expirada --}}
            @csrf

            <x-validate_error/>

            <x-form.text_input type="email" name="email" placeholder="Digite seu e-mail"
                label="Email" required="required" />

            <x-form.text_input type="password" name="password" placeholder="Digite sua senha"
                label="Senha" required="required" />

            <x-form.form_button resetTxt="Limpar"  submitTxt="Login" />

        </form>
    </section>
</x-layout>