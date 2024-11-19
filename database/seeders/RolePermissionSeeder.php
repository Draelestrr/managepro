<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

$adminRole = Role::findByName('Administrador');
$user = User::find(1); // Cambia "1" por el ID del usuario
$user->assignRole($adminRole);

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Crear permisos
        $permissions = [
            'view categories', 'create categories', 'edit categories', 'delete categories',
            'view products', 'create products', 'edit products', 'delete products',
            'view suppliers', 'create suppliers', 'edit suppliers', 'delete suppliers',
            'view stock_entries', 'create stock_entries',
            'view users', 'create users', 'edit users', 'delete users',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Crear roles y asignar permisos
        $adminRole = Role::firstOrCreate(['name' => 'Administrador']);
        $adminRole->syncPermissions(Permission::all()); // Acceso total.

        $supervisorRole = Role::firstOrCreate(['name' => 'Supervisor']);
        $supervisorRole->syncPermissions([
            'view categories', 'create categories', 'edit categories',
            'view products', 'create products', 'edit products',
            'view suppliers', 'create suppliers', 'edit suppliers',
            'view stock_entries', 'create stock_entries',
            'view users', 'create users', 'edit users',
        ]);

        $workerRole = Role::firstOrCreate(['name' => 'Trabajador']);
        $workerRole->syncPermissions([
            'view categories',
            'view products',
            'view suppliers',
            'view stock_entries', 'create stock_entries',
        ]);
    }
}

$adminRole = Role::findByName('Administrador');
$user = User::find(1); // Cambia "1" por el ID del usuario
$user->assignRole($adminRole);

