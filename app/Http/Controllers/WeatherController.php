<?php

namespace App\Http\Controllers;

use RakibDevs\Weather\Weather;


class WeatherController extends Controller
{
    public function defaultCity()
    {
        
        $wt = new Weather();

        $info = $wt->getCurrentByCity('lubumbashi');
        
        // dd($info);
        return view('home',compact('info'));

    }
}
