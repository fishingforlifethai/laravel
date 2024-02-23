<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            array(
                'name'=>'แอดมินเศรษฐ์',
                'email'=>'adminsate@gmail.com',
                'password'=>Hash::make('adminsate'),
                'role'=>'admin',
                'status'=>'active'
            ),
            array(
                'name'=>'บิล',
                'email'=>'billcustomer@gmail.com',
                'password'=>Hash::make('billsate'),
                'role'=>'user',
                'status'=>'active'
            ),
        );

        DB::table('users')->insert($data);
    }
}
