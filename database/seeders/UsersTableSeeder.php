<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id'=> 1,
            'name'=> 'Tanzim Rahman',
            'email'=> 'tanzimhyped@gmail.com',
            'password'=> bcrypt('tanzim2020'),    
        ]);
        DB::table('users')->insert([
            'role_id'=> 2,
            'name'=> 'Service Admin',
            'email'=> 'tanzim008@gmail.com',
            'password'=> bcrypt('tanzim2020'),    
        ]);
    }
}
