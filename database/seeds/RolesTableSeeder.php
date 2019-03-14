<?php

use Illuminate\Database\Seeder;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(['title' => 'User Administrator']);
        DB::table('roles')->insert(['title' => 'Post Moderator']);
        DB::table('roles')->insert(['title' => 'Theme Manager']);

    }
}
