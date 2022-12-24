<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $r)
    {
        //com o método check() do Facade Auth podemos verificar se o usuário já está logado
        //este método returna um valor booleano, para determinar se o usuário atual está autenticado ou não
        //se o usuário já estiver logado, redireciona para a rota 'home'
        $isLoggedIn = Auth::check();
        
        if ($isLoggedIn) {
            return redirect(route('home'));
        }

        //usar Auth::check() para verificar se usuário está logado
        //usar Auth::user() para resgatar dados do usuário no banco


        return view('login');
    }

    public function register(Request $r)
    {

        $isLoggedIn = Auth::check();
        
        if ($isLoggedIn) {
            return redirect(route('home'));
        }

        return view('register');
    }

    public function register_action(Request $r)
    {

        // Regras para registro:
        // X Usuário tem que ter um nome
        // X Email deve ser único na tabela de usuários
        // X Todos os campos precisam estar preenchidos
        // X Password precisa de no mínimo 6 caracteres e precisa bater com o campo de confirmação


        //com a classe validate podemos fazer validações de forma mais prática no laravel
        //basta inserirmos o name do input que queremos e em seguida os argumentos de validação. Quando há mais de um usamos | para passar o resto
        $r->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed' //passamos o argumento confirmed para o input que envia a senha. 
            //Basta criarmos outro input com o mesmo nome do input de senha e adicionar um _confirmed. ex: password_confirmed
        ]);                                         //dessa forma, fazemos uma validação da confirmação da senha, sem precisar escrever manualmente a validação

        //se não passar em qualquer uma das validações, a requisição não é enviada e voltamos para a tela do form
        //podemos exibir as mensagens de erro na view de diversas formas (componente validate_error.blade.php)

        $data = $r->only('name', 'email', 'password');
        $data['password'] = Hash::make($data['password']); //transformando o valor do input password recebido na request em um hash

        User::create($data);

        return redirect(route('login'));
    }

    public function login_action(Request $r)
    {

        $validator = $r->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        //Auth::attempt é usado pra verificar as credenciais do usuário no banco e autenticar o usuário na aplicação
        if (Auth::attempt($validator)) {
            return redirect(route('home'));
        }
        else{
            session()->flash('loginError', 'Invalid Password or Username');    
            return redirect(route('login'));
        }
    }

    public function logout(Request $r){

        //desloga o usuário autenticado
        Auth::logout();

        return redirect(route('login'));
    }
}
