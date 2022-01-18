<?php
namespace Annv\Demo\Http\Controllers;
class DemoController {
	public function annvDemoPage(\Request $request)
	{
		dump(config('annv-demo'));
		return view('annv-demo::index');
	}
}