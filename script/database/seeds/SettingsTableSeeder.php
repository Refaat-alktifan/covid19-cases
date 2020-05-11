<?php

use Illuminate\Database\Seeder;
use App\Settings;
class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::create([
        	'content'=>'{"zoom":"5","center_lat":"47.5162","center_lng":"14.5501","adds":null,"api":null}',
        	'logo'=>'uploads/logo.png',
        	'favicon'=>'uploads/favicon.ico',
        ]);
    }
}
