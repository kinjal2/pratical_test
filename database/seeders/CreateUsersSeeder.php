<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class CreateUsersSeeder extends Seeder
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
               'name'=>'Admin',
               'email'=>'testadmin@gmail.com',
               'is_admin'=>'1',
               'password'=> bcrypt('pass@123'),
			   'address'=> 'test',
			   'mobile_number'=>1234567890,
            ],
            
        ];
		 foreach ($user as $key => $value) {
            User::create($value);
        }
  
    }
}
