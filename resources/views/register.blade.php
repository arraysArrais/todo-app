<x-layout page="Login">
    <x-slot:btn>
        {{-- ref ao name da rota, e não a rota em si --}}
        <a href="{{route('login')}}" class="btn btn-primary">
            Já possui conta? Faça login
        </a>
    </x-slot:btn>

    Tela de registro
</x-layout>