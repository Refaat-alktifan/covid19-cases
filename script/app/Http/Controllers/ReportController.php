<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
	public function AllCountry()
	{
		$url = "https://corona.lmao.ninja/v2/countries";
		return $json = json_decode(file_get_contents($url), true);
	}

	public function country(Request $request,$id)
	{
			$url = "https://corona.lmao.ninja/v2/countries/".$id;
			return $json = json_decode(file_get_contents($url), true);
	}
}
