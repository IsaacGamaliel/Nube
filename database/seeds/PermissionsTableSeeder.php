<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //Roles
        Permission::create(['name' => 'role.index', 'description' => 'Mostrar todos los roles']);
        Permission::create(['name' => 'role.create', 'description' => 'Crear un nuevo rol']);
        Permission::create(['name' => 'role.store', 'description' => 'Almacenar un nuevo rol']);
        Permission::create(['name' => 'role.edit', 'description' => 'Editar un rol']);
        Permission::create(['name' => 'role.update', 'description' => 'Actualizar un rol']);
        Permission::create(['name' => 'role.show', 'description' => 'Ver detalles del rol']);
        Permission::create(['name' => 'role.destroy', 'description' => 'Eliminar un rol']);


        $admin = Role::create(['name'=>'Admin']);
        $subscriber = Role::create(['name'=>'Suscriptor']);

        $admin->givePermissionTo(Permission::all());

       // $subscriber->givePermissionTo([
         //   'file.create',
           // 'file.store',
           // 'file.images'
        //]);

        $user= User::find(1);
        $user->assignRole('Admin');
    }
}
