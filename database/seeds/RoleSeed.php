<?php

namespace Djavue\Auth\Database\Seeds;

use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
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
            
            ['id' => 1, 'title' => 'Admin',],
            ['id' => 2, 'title' => 'Moderator',],
            ['id' => 3, 'title' => 'General User',],
            ['id' => 4, 'title' => 'Guest',],

        ];

        foreach ($items as $item) {
            \Djavue\Auth\Models\Role::create($item);
        }
    }
}
