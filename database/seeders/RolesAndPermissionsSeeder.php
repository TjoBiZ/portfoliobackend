<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаем роли
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleViewer = Role::create(['name' => 'viewer']);
        $roleWriter = Role::create(['name' => 'writer']);

        // Создаем разрешения
        $permissionView = Permission::create(['name' => 'view']);
        $permissionEdit = Permission::create(['name' => 'edit']);
        $permissionWrite = Permission::create(['name' => 'write']);

        // Присваиваем разрешения ролям
        $roleSuperAdmin->givePermissionTo(Permission::all());
        $roleAdmin->givePermissionTo([$permissionView, $permissionEdit, $permissionWrite]);
        $roleEditor->givePermissionTo([$permissionEdit, $permissionWrite]);
        $roleViewer->givePermissionTo($permissionView);
        $roleUser->givePermissionTo($permissionView);
        $roleWriter->givePermissionTo($permissionWrite);


        // Пример назначения ролей существующим пользователям
        $userOne = User::where('email', 'j@solarneutrino.com')->first();
        if ($userOne) {
            $userOne->assignRole('superadmin');
        }

        $userTwo = User::where('email', 'kodzero@gmail.com')->first();
        if ($userTwo) {
            $userTwo->assignRole('user');
        }
    }
}
