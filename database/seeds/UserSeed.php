<?php

namespace Djavue\Auth\Database\Seeds;

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
	protected $trans = [];
	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'email' => env('ADMIN_UNAME', 'admin'), 'password' => env('ADMIN_UPASS', 'demo'), 'remember_token' => '',],
            ['id' => 2, 'name' => 'Moderator', 'email' => env('MOD_UNAME', 'mod'), 'password' => env('MOD_UPASS', 'demo'), 'remember_token' => '',],
            ['id' => 3, 'name' => 'General User', 'email' => env('GENERAL_UNAME', 'general'), 'password' => env('GENERAL_UPASS', 'demo'), 'remember_token' => '',],
            ['id' => 4, 'name' => 'Guest', 'email' => env('GUEST_UNAME', 'guest'), 'password' => env('GUEST_UPASS', 'demo'), 'remember_token' => '',],

        ];

        foreach ($items as $item) {
            \Djavue\Auth\Models\User::create($item);
        }
    }
}
