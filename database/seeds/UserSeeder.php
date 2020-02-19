<?php

use Illuminate\Database\Seeder;

use App\User;

class UserSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(User $user)
    {
        $user->create([
            'nome'=>'Rickson Simioni Pereira',
            'email'=>'ricksonsimioni@gmail.com',
            'senha'=>'123456',
            'funcao_id'=>'1',
            'data_nascimento'=>'1998/01/20',
            'salario'=>'1200',
        ]);
        $user->create([
            'nome'=>'Matheus Sanches quessada',
            'email'=>'matheusquessada@hotmail.com',
            'senha'=>'123456',
            'funcao_id'=>'2',
            'data_nascimento'=>'1997/02/05',
            'salario'=>'3000',
        ]);
        $user->create([
            'nome'=>'Matheus Baptista',
            'email'=>'brilhante@gmail.com',
            'senha'=>'123456',
            'funcao_id'=>'3',
            'data_nascimento'=>'1998/03/10',
            'salario'=>'6000',
        ]);
    }
}
