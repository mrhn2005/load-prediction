<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function dashboard()
    {
        return view('panel.dashboard.index');
    }

    public function changeCity(Request $request)
    {
        $city = $request->input('city');
        if (in_array($city, config('custom.cities'), true)) {
            session(['userCity' => $city]);
        } else {
            session(['userCity' => config('custom.default_city')]);
        }

        return redirect()->back()->with([
            'success' => trans('messages.city_changed_successfully'),
        ]);
    }
}
