<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->insert([
            'name' => 'Cerulean',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/3.3.7/cerulean/bootstrap.min.css',
            'description' => 'A calm blue sky',
            'is_default' => 1,
            'created_by' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')]);

        DB::table('themes')->insert([
            'name' => 'Cosmo',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css',
            'description' => 'An ode to Metro',
            'is_default' => 0,
            'created_by' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')]);

        DB::table('themes')->insert([
            'name' => 'Cyborg',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/3.3.7/cyborg/bootstrap.min.css',
            'description' => 'Jet black and electric blue',
            'is_default' => 0,
            'created_by' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')]);

        DB::table('themes')->insert([
            'name' => 'Darkly',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/3.3.7/darkly/bootstrap.min.css',
            'description' => 'Flatly in night mode',
            'is_default' => 0,
            'created_by' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')]);

        DB::table('themes')->insert([
            'name' => 'Flatly',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css',
            'description' => 'Flatly and modern',
            'is_default' => 0,
            'created_by' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')]);

        DB::table('themes')->insert([
            'name' => 'Journal',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/3.3.7/journal/bootstrap.min.css',
            'description' => 'Crisp like a new sheet of paper',
            'is_default' => 0,
            'created_by' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')]);

        DB::table('themes')->insert([
            'name' => 'Lumen',
            'cdn_url' => 'https://stackpath.bootstrapcdn.com/bootswatch/3.3.7/lumen/bootstrap.min.css',
            'description' => 'Light and shadow',
            'is_default' => 0,
            'created_by' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')]);



    }
}
