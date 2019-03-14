<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jessica',
            'email' => 'jessicamurray91@gmail.com',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')]);

        DB::table('users')->insert([
            'name' => 'Cat',
            'email' => 'kittens@cats.com',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')]);

        DB::table('users')->insert([
            'name' => 'Example McTest',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
    }
}
