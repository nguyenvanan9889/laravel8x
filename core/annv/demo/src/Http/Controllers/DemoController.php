<?php
namespace Annv\Demo\Http\Controllers;
class DemoController {
	public function annvDemoPage(\Request $request)
	{
		return view('annv-demo::index');
	}
}