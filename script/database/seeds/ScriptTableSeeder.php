<?php

use Illuminate\Database\Seeder;
use App\Script;

class ScriptTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Script::create([
        	'css' => null,
        	'js' => null
        ]);
    }
}
