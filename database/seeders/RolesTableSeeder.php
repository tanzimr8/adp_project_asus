<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'=> 'Service Admin',
            'slug'=> 'admin'
        ]);

        DB::table('roles')->insert([
            'name'=> 'SuperAdmin',
            'slug'=> 'superadmin'
        ]);
        DB::table('roles')->insert([
            'name'=> 'Customer',
            'slug'=> 'customer'
        ]);
    }
}
