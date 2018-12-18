<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        $url = 'https://api.weather.yandex.ru/v1/forecast?lat=53.243325&lon=34.363731';
        $headers = array('X-Yandex-API-Key: '.  env('YANDEX_WEATHER_KEY'));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec ($ch);
        curl_close ($ch);

        $weather = json_decode($response);

        return view('pages.weather',['weather'=> $weather]);
    }
}
