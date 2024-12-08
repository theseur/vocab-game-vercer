<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->password = Hash::make('Admin123.');
        $user->email = 'hekale@freemail.hu';
        $user->name = 'Administrator';
        $user->save();
        
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);
        $roleTeacher = Role::create(['name' => 'teacher']);
        $user->assignRole($roleAdmin);

        
        
    }
}
