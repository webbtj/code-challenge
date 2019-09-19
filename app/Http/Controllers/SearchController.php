<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SpotifyClient;

class SearchController extends Controller
{
    public function index()
    {
        return view('index');
    }


    public function search(Request $request)
    {
        $query = $request->get('query');
        $client = new SpotifyClient();
        $results = $client->search($query);
        return view('search', ['searchTerm' => $query, 'results' => $results]);
    }

    public function artist(Request $request, $artistId)
    {
        $client = new SpotifyClient();
        $results = $client->getArtist($artistId);
        return view('artist', ['artist' => $results]);
    }

    public function album(Request $request, $albumId)
    {
        $client = new SpotifyClient();
        $results = $client->getAlbum($albumId);
        return view('album', ['album' => $results]);
    }

    public function track(Request $request, $trackId)
    {
        $client = new SpotifyClient();
        $results = $client->getTrack($trackId);
        return view('track', ['track' => $results]);
    }
}
