<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'admin',
                'email'=>'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'level'=> 'admin'
            ],
            [
                'name' => 'owner',
                'email'=>'owner@gmail.com',
                'password' => bcrypt('owner123'),
                'level'=> 'owner'
            ],
        ];
        foreach($user as $key => $value){
            Account::create($value);
        }
    }
}
