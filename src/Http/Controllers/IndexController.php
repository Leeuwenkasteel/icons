<?php

namespace Leeuwenkasteel\Icons\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Leeuwenkasteel\Icons\Models\Icon;

class IndexController extends Controller{
    public function index(){
		$icons = Icon::all();
		return view('icons::index', compact('icons'));
	}
}