<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            // 'age' => 20,

            'dni' => '87547785X',
            'nombre' => 'Oscar',
            'apellido' => 'Portillo',
            'direccion' => 'Calle de la luz',
            'email' => 'oscar@gmail.com',
            'password' => bcrypt('secret'),
            'telefono' => '662061508',
            'role_id' => 1,
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            // 'age' => 20,

            'dni' => '65462567J',
            'nombre' => 'Gonzalo',
            'apellido' => 'Martínez',
            'direccion' => 'Av catalnya',
            'email' => 'gonzaloempleado@gmail.com',
            'password' => bcrypt('secret'),
            'telefono' => '662045897',
            'role_id' => 2,
            'remember_token' => str_random(10),

            
        ]);
        DB::table('users')->insert([
            'dni' => '99857659P',
            'nombre' => 'Pablo',
            'apellido' => 'Serrats',
            'direccion' => 'Av Goméz Laguna',
            'email' => 'pablillo@gmail.com',
            'password' => bcrypt('secret'),
            'telefono' => '668952458',
            'role_id' => 2,
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'dni' => '55929937D',
            'nombre' => 'Patricia',
            'apellido' => 'Goméz',
            'direccion' => 'Av Goméz Laguna',
            'email' => 'patricia@gmail.com',
            'password' => bcrypt('secret'),
            'telefono' => '66202548',
            'role_id' => 3,
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'dni' => '43345385E',
            'nombre' => 'Bea',
            'apellido' => 'Portillo',
            'direccion' => 'Av Goméz Laguna',
            'email' => 'bea@gmail.com',
            'password' => bcrypt('secret'),
            'telefono' => '66202548',
            'role_id' => 3,
            'remember_token' => str_random(10),
        ]);
        
        // factory(App\User::class, 50)->create();
    }
}
