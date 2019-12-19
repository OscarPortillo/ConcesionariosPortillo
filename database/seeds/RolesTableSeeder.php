<?php
use Illuminate\Database\Seeder;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => 1,
            'nombre' => 'Administrador',
        ]);
        DB::table('roles')->insert([
            'id' => 2,
            'nombre' => 'Empleado',
        ]);
        DB::table('roles')->insert([
            'id' => 3,
            'nombre' => 'Cliente',
        ]);
    }
}