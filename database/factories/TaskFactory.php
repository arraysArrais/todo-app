<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::all()->random(); //busca no banco todos os registros de usuários inseridos e seleciona um aleatório

        //previne a criação de usuário sem categoria
        //pois ao criarmos mais usuários do que categorias, eventualmente pode SOBRAR usuário sem categoria
        while(count($user->categories)==0){
            $user = User::all()->random();
        }

            
        //$user = $user::all()->random();
        //$category = Category::where('user_id', $user->id);

        //ou

        //$category = $user->categories->random();

        return [
            'is_done' => $this->faker->boolean(),
            'title' => $this->faker->text(10),
            'description' => $this->faker->text(60),
            'due_date' => $this->faker->dateTime(),
            'user_id' => $user,
            'category_id' => $user->categories->random() //como já temos esses 2 models relacionados no laravel, podemos acessar os atributos de relacionamento como se fossem atributos de objetos
            //então 'category_id' recebe $user->categories e depois chamamos o método random() pra escolher uma aleatória

            //isso resolve o problema de criar tasks com usuários que não possuem determinada categoria.
        ];
    }
}
