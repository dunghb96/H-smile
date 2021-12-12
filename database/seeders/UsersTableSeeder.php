<?php

namespace Database\Seeders;

use App\Enums\CommonStatus;
use App\Enums\RoleEnum;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = Employee::create([
            'name' => 'Admin',
            'email' => 'dev@hsmile.com',
            'position' => 'Admin',
            'short_description' => 'Admin',
            'type' => 3,
            'status' => CommonStatus::Active
        ]);
        $user = User::where('email', 'dev@hsmile.com')->first();
        if (!$user) {
            $user = User::create([
                'employee' => $employee->id,
                'user_code' => '88888888',
                'name' => 'Admin',
                'email' => 'dev@hsmile.com',
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
                'status' => CommonStatus::Active
            ]);
        }
        //set permission
        $user->assignRole(RoleEnum::Admin);
    }
}
