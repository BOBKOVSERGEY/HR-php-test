<?php


namespace App\Http\Controllers;


use App\Weather;

class WeatherController extends Controller
{
    /**
     * @param Weather $weather
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Weather $weather)
    {
        return view('weather.index', [
            'pageTitle' => 'Температура в Брянске',
            'temperature' => $weather->getTemperature(),
        ]);
    }
}