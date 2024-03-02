<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $roles = ['admin', 'manager', 'user'];
        foreach ($roles as $role) {
            Role::factory()->create([
                'name' => $role
            ]);
        }
    }
}
