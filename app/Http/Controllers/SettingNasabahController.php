<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingNasabahController extends Controller
{
    public function index(){
        return view ('nasabah.setting');
    }
}
