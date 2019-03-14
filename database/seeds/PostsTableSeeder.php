<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('posts')->insert([
            'title' => 'The first post',
            'body' => 'The first post\'s body',
            'created_by' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('posts')->insert([
            'title' => 'Senegal Parrot',
            'body' => 'The Senegal parrot is a Poicephalus parrot which is a resident breeder across a wide range of west Africa.
             It makes migrations within west Africa, according to the availability of the fruit, seeds and blossoms which make up its diet.
              It is considered a farm pest in Africa, often feeding on maize or millet.',
            'created_by' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
    }
}
