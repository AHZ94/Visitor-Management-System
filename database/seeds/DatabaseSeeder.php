<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	/*DB::table('users')->insert([
            "name" => "admin",            
            "email" => "admin@vms.com",
            "password" => bcrypt(env('admin', 'admin123')),]            
        );*/

        /*DB::table('appointments')->insert([
            "user_id" => "1",
            "visitor_id" => "1",
            "vehicle_id" => "1",
            "date" => "2018-11-22",
            "times" => "09:23:35",
            "check_in" => "09:23:35",
            "check_out" => "09:23:35",
            "approval" => "admin",
            "status" => "Pending",
            "purpose" => "Others",
            "unique_code" => "asd123",
            "remarks" => "Hello",
            "no_person" => "1",            
        ]);
        */
    }
    
}
