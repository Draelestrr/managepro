<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@managepro.cl'],
            ['name' => 'Admin', 'password' => bcrypt('password')]
        );
        $admin->assignRole('Administrador');

        $supervisor = User::firstOrCreate(
            ['email' => 'supervisor@managepro.cl'],
            ['name' => 'Supervisor', 'password' => bcrypt('password')]
        );
        $supervisor->assignRole('Supervisor');

        $worker = User::firstOrCreate(
            ['email' => 'worker@managepro.cl'],
            ['name' => 'Trabajador', 'password' => bcrypt('password')]
        );
        $worker->assignRole('Trabajador');
    }
}
