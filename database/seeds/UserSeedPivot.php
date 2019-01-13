<?php

namespace Djavue\Auth\Database\Seeds;

use Illuminate\Database\Seeder;

class UserSeedPivot extends Seeder
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
            
            1 => [
                'role' => [1],
            ],
            2 => [
                'role' => [2],
            ],
            3 => [
                'role' => [3],
            ],
            4 => [
                'role' => [4],
            ],

        ];

        foreach ($items as $id => $item) {
            $user = \Djavue\Auth\Models\User::find($id);

            foreach ($item as $key => $ids) {
                $user->{$key}()->sync($ids);
            }
        }
    }
}
