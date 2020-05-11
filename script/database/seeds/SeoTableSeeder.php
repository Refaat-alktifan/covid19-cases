<?php

use Illuminate\Database\Seeder;
use App\Seo;

class SeoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seo::create([
        	'meta_title' => "covid19-cases",
        	'author' => "Refaat AL Ktifan",
        	'meta_tags' => "Corona,Map,covid-19, refaat al ktifan, corona freising, corona deutschland",
        	'meta_description' => null
        ]);
    }
}
