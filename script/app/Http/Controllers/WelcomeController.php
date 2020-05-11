<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Settings;
use App\Seo;
use App\Script;
use Artesaos\SEOTools\Facades\SEOTools;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class WelcomeController extends Controller
{
    public function index()
    {
    	try {
          DB::connection()->getPdo();
        if(DB::connection()->getDatabaseName()){
            $seo=Seo::first();
            $query = Settings::first();
            $script = Script::first();
           
            SEOTools::setTitle($seo->meta_title);
            SEOTools::setDescription($seo->meta_description);
            SEOTools::opengraph()->setUrl(url('/'));
            SEOTools::setCanonical(url('/'));
            SEOTools::opengraph()->addProperty('keywords', $seo->meta_tags);
            SEOTools::twitter()->setSite($seo->meta_title);
            SEOTools::jsonLd()->addImage($query->logo);

            $query = Settings::first();
            $info = json_decode($query->content);
        	return view('welcome',compact('info','script','query'));
        }else{
            return redirect()->route('install');
        }
        } catch (\Exception $e) {
            return redirect()->route('install');
        }
    	
    }
}
