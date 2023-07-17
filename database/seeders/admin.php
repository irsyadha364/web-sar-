<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'admin' => 1,
        ]);
        DB::table('users')->insert(
            [
                'name' => 'user',
                'email' => 'user@admin.com',
                'password' => Hash::make('user123'),
                'admin' => 0,
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'Irsyadha Alfyrdhousi Redhysyahputra',
                'email' => 'irsyadhaalfyrdhousi@gmail.com',
                'password' => Hash::make('asdw1234'),
                'admin' => 0,
            ]
        );
    }
}
