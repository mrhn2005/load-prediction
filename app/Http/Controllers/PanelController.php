<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function dashboard()
    {
        return view('panel.dashboard.index');
    }
}
