<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Creating An admin account */

        $User = new User();
        $User->name ='Administrateur';
        $User->email ='admin@aksam.ma';
        $User->Reference ='1';
        $User->type='Admin';
        $User->password = Hash::make('test@123');
        $User->save();
     
    }
}
