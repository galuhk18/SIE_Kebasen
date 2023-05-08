<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Config;


class HomeController extends Controller
{
    public function index() {
        Alert::success('TEst');
        // $religion = Config::get('enums.married');
        // dd($religion);
        return view('home');
    }
}
