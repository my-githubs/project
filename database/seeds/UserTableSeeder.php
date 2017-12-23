<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $d=[];
        for($i=0;$i<50;$i++){
        	$data=[];
        	$data['username']=str_random(12);
        	$data['phone']=str_random(11);
        	$data['password']=Hash::make('admin');
        	$data['email']=str_random(10).'@163.com';
        	$data['profile'] =$faker->imageUrl(200,200);
        	$d[]=$data;
        }
        DB::table('user')->insert($d);
    }
}
