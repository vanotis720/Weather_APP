<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use RakibDevs\Weather\Weather;


class WeatherController extends Controller
{
    public function defaultCity($city = 'Lubumbashi')
    {
        
        $wt = new Weather();

        $info = $wt->getCurrentByCity($city);
        
        // dd($info);
        return view('home',compact('info','city'));
    }

    public static function principalCity()
    {
        return array('Kinshasa','Lubumbashi','Mbuji mayi', 'Kananga');
    }
}
