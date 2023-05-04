<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            'description'=>"This hotel is located in the political capital of Burundi, Gitega. It enjoys an ideal location in a young and quiet high standing neighborhood, Bwoga I located in Gitega, with easy access by the RN2 Gitega-Bujumbura national road. The hotel meets all the requirements of a high-class hotel that meets International standards.",
            'short_des'=>"This hotel is located in the political capital of Burundi, Gitega.",
            // 'photo'=>"image.jpg",
            'logo'=>'logo.jpeg',
            'address'=>"Chato Beach Street, Ukaranga, Geita, Tanzania. (4.1 km from the center)",
            'email'=>"info@chatobeachresort.com",
            'phone'=>"+255 737 562 788",
        );
        DB::table('settings')->insert($data);
    }
}
