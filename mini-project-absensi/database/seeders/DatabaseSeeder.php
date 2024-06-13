<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;//tambahan
use App\Models\Role;//tambahan

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //tambahan
        Role::create([
            'role_name'=>'admin',
        ]);

        Role::create([
            'role_name'=>'pj',
        ]);

        Role::create([
            'role_name'=>'asisten',
        ]);

        User::factory(5)->create();
        //tambahan
    }
}
