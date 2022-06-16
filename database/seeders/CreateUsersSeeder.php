<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

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
				'email'=>'admin@gmail.com',
				'is_admin'=>'1',
				'company_name'=>'miger',
				'address'=>'Via Croce Rossa 11,Ghilarza, Oristano',
				'website'=>'http://miger.com',
				'phone_number'=>'+18965424785',
				'mobile_number'=>'+178964644',
				'password'=> bcrypt('admin@123'),
            ],
            [
				'name'=>'Raj',
				'email'=>'raj@gmail.com',
				'is_admin'=>'0',
				'company_name'=>'panamemory',
				'address'=>'Via del Pontiere 57,Vallo Torinese, Torino',
				'website'=>'http://panamemory.com',
				'phone_number'=>'148744545',
				'mobile_number'=>'1897486484',
				'password'=> bcrypt('123456'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
