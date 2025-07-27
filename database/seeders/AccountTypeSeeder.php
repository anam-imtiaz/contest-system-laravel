<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
Use DB;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //DB::table('account_type')->truncate();
        DB::table('account_type')->insert([
            'title' => 'Admin',
        ]);
        DB::table('account_type')->insert([
            'title' => 'User',
        ]); 
        DB::table('account_type')->insert([
            'title' => 'Guest',
        ]); 
    }
}
