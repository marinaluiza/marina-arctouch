<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    private $API_KEY = '810bcab4514b608978779ba561c1375a';

    public function index()
    {
        return view('movies');
    }

    public function listMovies($page = null) {
        $client = new Client();

        $configResponse = $client->request('GET', 'https://api.themoviedb.org/3/configuration?api_key=' . $this->API_KEY);
        $resultConfig = $configResponse->getBody()->getContents();
        $configuration = json_decode($resultConfig, true);

        $responseGenres = $client->request('GET',
            'https://api.themoviedb.org/3/genre/movie/list?api_key=' . $this->API_KEY . '&language=en-US');
        $genres = json_decode($responseGenres->getBody()->getContents(), true);
        $response = $client->request('GET',
            'https://api.themoviedb.org/3/movie/upcoming?api_key=' . $this->API_KEY . '&language=en-US&page=' . $page);
        $result = $response->getBody()->getContents();
        $result = json_decode($result, true);
        return view('movieList')->with('result', $result)->with('config', $configuration)->with('genres',
            array_column($genres['genres'], 'name', 'id'));
    }
    public function showMovie($id, $page)
    {
        $client = new Client();
        $response = $client->request('GET',
            'https://api.themoviedb.org/3/movie/'. $id . '?api_key=' . $this->API_KEY . '&language=en-USxw');
        $result = $response->getBody()->getContents();

        $configResponse = $client->request('GET', 'https://api.themoviedb.org/3/configuration?api_key=' . $this->API_KEY);
        $resultConfig = $configResponse->getBody()->getContents();
        $configuration = json_decode($resultConfig, true);

        $movie = json_decode($result, true);
        $movie['genres'] = implode(',', array_column($movie['genres'], 'name'));
        return view('movieDetail')->with('movie', $movie)->with('page', $page)->with('config', $configuration);
    }

    public function search($query)
    {
        $client = new Client();
        $response = $client->request('GET',
            'https://api.themoviedb.org/3/search/movie?api_key=' . $this->API_KEY . '&query=' . $query);
        $result = $response->getBody()->getContents();
    }
}
