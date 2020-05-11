<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		 $query = Settings::first();
		 $info = json_decode($query->content);
		 return view('admin.settings', compact('info'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		
		 $info = Settings::first();
		 return view('admin.sitesettings', compact('info'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$request->validate([
			'logo' => 'image',
			'favicon' => 'mimes:ico',

		]);
		$settings = Settings::first();

		if ($request->logo) {
			$imageName = time() . '.' . request()->logo->getClientOriginalExtension();
			request()->logo->move('uploads/', $imageName);
			$logo = 'uploads/' . $imageName;
			if (file_exists($settings->logo)) {
				unlink($settings->logo);
			}

		} else {
			$logo = $settings->logo;
		}

		if ($request->favicon) {
			$imageName = time() . '2.' . request()->favicon->getClientOriginalExtension();
			request()->favicon->move('uploads/', $imageName);
			$favicon = 'uploads/' . $imageName;
			if (file_exists($settings->favicon)) {
				unlink($settings->favicon);
			}

		} else {
			$favicon = $settings->favicon;
		}

		$settings->logo = $logo;
		$settings->favicon = $favicon;
		$settings->save();
		

		
          $notification = array(
            'message' => 'Settings Updated',
            'alert-type' => 'success'
        );

        return back()->with($notification);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		

		$setting['zoom'] = $request->zoom;
		$setting['center_lat'] = $request->center_lat;
		$setting['center_lng'] = $request->center_lng;
		$setting['api'] = $request->api;
		$setting['adds'] = $request->adds;

		$info = Settings::first();
		
		$info->content = json_encode($setting);

		$info->save();
		 
          $notification = array(
            'message' => 'Settings Updated',
            'alert-type' => 'success'
        );

        return back()->with($notification);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
