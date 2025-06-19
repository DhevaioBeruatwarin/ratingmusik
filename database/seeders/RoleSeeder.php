<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah user admin sudah ada
        $admin = DB::table('users')->where('username', 'admin')->first();
        if ($admin) {
            // Update data admin
            DB::table('users')->where('username', 'admin')->update([
                'name' => 'Admin',
                'password' => Hash::make('password123'), // Ganti dengan password yang aman
                'role' => 'admin',
                'updated_at' => Carbon::now(),
            ]);
        } else {
            // Insert user admin baru
            DB::table('users')->insert([
                'name' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('password123'), // Ganti dengan password yang aman
                'role' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
