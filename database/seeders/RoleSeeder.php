<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil role berdasarkan kode
        $adminRole = Role::where('kode_role', 'ADM001')->first();
        $petugasRole = Role::where('kode_role', 'PTG001')->first();
        $userRole = Role::where('kode_role', 'PMJ001')->first();

        // Admin
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin123'),
                'role_id' => $adminRole->id
            ]
        );

        // Petugas
        User::updateOrCreate(
            ['email' => 'petugas@gmail.com'],
            [
                'name' => 'Petugas',
                'password' => Hash::make('petugas123'),
                'role_id' => $petugasRole->id
            ]
        );

        // User / Peminjam
        User::updateOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'User',
                'password' => Hash::make('user123'),
                'role_id' => $userRole->id
            ]
        );
    }
}