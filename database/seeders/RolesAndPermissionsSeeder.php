<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions (Penting agar tidak error saat caching)
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat Daftar Kumpulan Permission
        $permissions = [
            'view agendas',
            'create agendas',
            'edit agendas',
            'delete agendas',

            'view kegiatans',
            'create kegiatans',
            'edit kegiatans',
            'delete kegiatans',

            'view usulans',
            'create usulans',
            'edit usulans',
            'delete usulans',

            'view kemiskinans',
            'create kemiskinans',
            'edit kemiskinans',
            'delete kemiskinans',

            'view inovasis',
            'create inovasis',
            'edit inovasis',
            'delete inovasis',

            'view kajians',
            'create kajians',
            'edit kajians',
            'delete kajians',

            'view infografis',
            'create infografis',
            'edit infografis',
            'delete infografis',

            'view users',
            'create users',
            'edit users',
            'delete users',

            'view bidangs',
            'create bidangs',
            'edit bidangs',
            'delete bidangs',

            'view ruangans',
            'create ruangans',
            'edit ruangans',
            'delete ruangans',

            'view medias',
            'create medias',
            'edit medias',
            'delete medias',

            'manage users',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Role: Admin (Diberikan semua permission awal)
        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->givePermissionTo(Permission::all());

        // Role: Front Office (Hanya bisa buat dan edit artikel sendiri)
        $foRole = Role::create(['name' => 'Front Office']);
        $foRole->givePermissionTo([
            'view agendas',
            'create agendas',
            'edit agendas',
            'delete agendas',

            'view kegiatans',
            'create kegiatans',
            'edit kegiatans',
            'delete kegiatans',
        ]);

         // Buat User Contoh & Assign Role-nya

        // Contoh User Super Admin
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@mail.go.id',
            'password' => Hash::make('bapperida123'), // Ganti dengan password yang aman
        ]);
        $admin->assignRole($adminRole);

        // Contoh User Admin
        $fo = User::create([
            'name' => 'Front User',
            'email' => 'fo@mail.go.id',
            'password' => Hash::make('12345678'),
        ]);
        $fo->assignRole($adminRole);

    }
}
