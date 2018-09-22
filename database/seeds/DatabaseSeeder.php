<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $a=array("Action","Adventure","Horror","Drama","SciFi");
        
        for($i=0; $i<3; $i++){
            $nRef = DB::table('tblFilms')->insertGetId([
                'f_name' => str_random(10),
                'f_slug' => str_random(5),
                'f_desc' => str_random(100),
                'f_photo' => 'trivia11.jpg',
                'f_release_date' => date("Y-m-d"),
                'f_ticket_price' => rand(10,100) . " USD",
                'f_rating' => rand(1,5),
                'f_country' => 'USA',
                'f_genre' => $a[rand(0,4)]
            ]);
            
            DB::table('tblComments')->insertGetId([
                'c_name' => str_random(10),
                'c_film_id' => $nRef,
                'c_comment' => str_random(100)
            ]);
        }
    }
}
