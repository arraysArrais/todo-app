@if ($errors->any())
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
@endif

{{-- flashmsg para erro na tela de login --}}
@if (session()->has('loginError'))
    <div>
        <li>{{ session()->get('loginError') }}</li>
    </div>
@endif