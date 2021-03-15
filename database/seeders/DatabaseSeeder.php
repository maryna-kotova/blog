<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // DB::table('users')->insert([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('admin'),
        // ]);

        // DB::table('roles')->insert([
        //     'name' => 'admin',
        //     'slug' => 'admin',            
        // ]);

        // DB::table('users_roles')->insert([
        //     'user_id' => '1',
        //     'role_id' => '1',            
        // ]);
    

        // \App\Models\User::factory(5)->create();
        // \App\Models\Category::factory(5)->create();
        \App\Models\Article::factory(10)->create();
        // \App\Models\Review::factory(5)->create();
        // \App\Models\News::factory(5)->create();

    }
}
