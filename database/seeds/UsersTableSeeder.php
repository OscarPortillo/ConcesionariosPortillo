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
            'nombre' => 'Administrador',
            'apellido' => 'Portillo',
            'direccion' => 'Alameda Lorem, 132A 19ºH',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'telefono' => '662061545',
            'role_id' => 1,
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            // 'age' => 20,

            'dni' => '65462567J',
            'nombre' => 'Empleado1',
            'apellido' => 'ApellidoEmp1',
            'direccion' => 'Travesía Lorem ipsum, 276B',
            'email' => 'empleado1@gmail.com',
            'password' => bcrypt('secret'),
            'telefono' => '662045857',
            'role_id' => 2,
            'remember_token' => str_random(10),

            
        ]);
        DB::table('users')->insert([
            'dni' => '99857659P',
            'nombre' => 'Empleado2',
            'apellido' => 'ApellidoEmp2',
            'direccion' => 'Travesía Lorem, 164',
            'email' => 'empleado2@gmail.com',
            'password' => bcrypt('secret'),
            'telefono' => '668952458',
            'role_id' => 2,
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'dni' => '55929937D',
            'nombre' => 'cliente1',
            'apellido' => 'clienteAp1',
            'direccion' => 'C. Comercial Lorem, 169 14ºC',
            'email' => 'cliente1@gmail.com',
            'password' => bcrypt('secret'),
            'telefono' => '662025489',
            'role_id' => 3,
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'dni' => '43345385E',
            'nombre' => 'cliente2',
            'apellido' => 'clienteAp2',
            'direccion' => 'Calle Lorem, 210A 9ºB',
            'email' => 'cliente2@gmail.com',
            'password' => bcrypt('secret'),
            'telefono' => '662025498',
            'role_id' => 3,
            'remember_token' => str_random(10),
        ]);
        
        // factory(App\User::class, 50)->create();
    }
}
