<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $objUser = new User();
        $objUser->name = 'John Doe';
        $objUser->email = 'admin@gmail.com';
        $objUser->password = Hash::make('admin123');
        $objUser->account_type_id = 1;
        $objUser->save();
    }
}
