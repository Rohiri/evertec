<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Tercero;
use App\Models\TerceroCampos;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'rol' => 'admin',
            'password' => bcrypt('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'username' => 'william',
            'email' => 'william@gmail.com',
            'password' => bcrypt('123456789'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
