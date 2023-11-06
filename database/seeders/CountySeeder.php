<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public $counties = [
    "Baringo",
    "Bomet",
    "Bungoma",
    "Busia",
    "Elgeyo Marakwet","Embu","garissa","Homa Bay","Isiolo",
    "Kajiado","Kakamega","Kericho","Kiambu","Kilifi","Kirinyaga",
    "Kisii","Kisumu","Kitui","Kwale","Laikipia","Lamu","Machakos","Makueni","Mandera",
    "Meru","Migori","Marsabit","Mombasa","Muranga","Nairobi","Nakuru","Nandi","Narok","Nyamira",
    "Nyandarua","Nyeri","Samburu","Siaya","Taita Taveta","Tana River","Tharaka Nithi","Trans nzoia",
    "Turkana","Uasin Gishu","Vihiga","Wajir",
    "Pokot"];
    
    public function run(): void
    {
        //
            $data = [];

            foreach($this->counties as $c){
                array_push($data , ['name' => $c]);
            }
            DB::table('counties')->insert($data);
    }
}
