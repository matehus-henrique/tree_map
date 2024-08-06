<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TreeMapController extends Controller
{
    public function index(Request $request)
    {
        $client = new Client();
        $city = $request->input('city', 'Porto Alegre');
        $response = $client->request('GET', 'https://api.openweathermap.org/data/2.5/weather', [
            'query' => [
                'q' => $city,
                'appid' => env('OPENWEATHERMAP_KEY'),
                'units' => 'metric'
            ]
        ]);

        $weather = json_decode($response->getBody()->getContents(), true);

        // Formate os dados para TreeMap, ajustando os tamanhos dos blocos
        $treeMapData = [
            'name' => 'root',
            'children' => [
                ['name' => 'Temperatura', 'size' => $weather['main']['temp'] * 10], 
                ['name' => 'Umidade', 'size' => $weather['main']['humidity'] * 10], 
                ['name' => 'Pressão', 'size' => $weather['main']['pressure']],
                ['name' => 'Velocidade do Vento', 'size' => $weather['wind']['speed'] * 20], 
                ['name' => 'Direção do Vento', 'size' => $weather['wind']['deg'] * 2], 
                ['name' => 'Nebulosidade', 'size' => $weather['clouds']['all']],
            ]
        ];

        return view('tree_map', ['data' => json_encode($treeMapData), 'city' => $city]);
    }
}
