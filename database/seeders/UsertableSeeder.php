<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsertableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_list = config('db_users');

        foreach ($user_list as $user) {
            $new_user = new User();
            $new_user->fill($user);
            $new_user->forceFill([
                'password' => Hash::make('password'),
                'remember_token' => Str::random(60),
            ]);
            $new_user->save();
        }
    }
}
