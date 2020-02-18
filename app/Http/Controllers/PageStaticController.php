<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageStatic;

class PageStaticController extends FrontendController
{
	public function __construct()
    {
        parent::__construct();
    }

    public function aboutUs()
    {
    	$page = PageStatic::where('ps_type', PageStatic::TYPE_ABOUT)->first();
    	return view('page_static.about',compact('page'));
    }
}
