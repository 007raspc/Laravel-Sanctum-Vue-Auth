<?php

namespace Database\Seeders;

use App\Models\Product\ProductColor;
use App\Models\Product\ProductSize;
use App\Models\Product\ProductType;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $roles = ['admin', 'manager', 'agent', 'visitor'];
        foreach ($roles as $role) {
            Role::factory()->create([
                'name' => $role
            ]);
        }

        $types = ['towels', 'cloth'];
        foreach ($types as $type) {
            ProductType::factory()->create([
                'name' => $type
            ]);
        }

        ProductColor::create(['name' => 'none']);
        ProductSize::create(['name' => 'none']);
    }
}
