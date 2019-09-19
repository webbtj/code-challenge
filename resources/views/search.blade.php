<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Code Challenge</title>
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: sans-serif;
            height: 100vh;
            margin: 50px;
        }

        .full-height {
            height: 100vh;
        }

        .result {
        }
    </style>
</head>
<body>
<div class="full-height">
    <div class="result">
        Your Search Term Was: <b>{{$searchTerm}}</b>
    </div>

    <div class="container">
        <h2>Albums</h2>
        <div class="row">
            @foreach($results->albums->items as $k => $album)
                <div class="col">
                    <img
                        class="img-thumbnail d-block"
                        src="{{objectArtwork($album)}}"
                        alt="{{$album->name}} by {{albumArtist($album)}}" />
                    <p class="pull-left">
                        <a href="{{route('album', $album->id)}}">{{$album->name}}</a>
                        by {{albumArtist($album)}}
                    </p>
                </div>
                @if(($k+1) % 4 == 0)
                    </div><div class="row">
                @endif
            @endforeach
        </div>

        <h2>Artists</h2>
        <div class="row">
            @foreach($results->artists->items as $k => $artist)
                <div class="col">
                    <img
                        class="img-thumbnail d-block"
                        src="{{objectArtwork($artist)}}"
                        alt="{{$artist->name}}" />
                    <p class="pull-left">
                        <a href="{{route('artist', $artist->id)}}">{{$artist->name}}</a>
                    </p>
                </div>
                @if(($k+1) % 4 == 0)
                    </div><div class="row">
                @endif
            @endforeach
        </div>

        <h2>Tracks</h2>
        <div class="row">
            @foreach($results->tracks->items as $k => $track)
                <div class="col">
                    <img
                        class="img-thumbnail d-block"
                        src="{{objectArtwork($track->album)}}"
                        alt="{{$track->name}} by {{albumArtist($track)}}" />
                    <p class="pull-left">
                        <a href="{{route('track', $track->id)}}">{{$track->name}}</a>
                        by {{albumArtist($track)}}
                    </p>
                </div>
                @if(($k+1) % 4 == 0)
                    </div><div class="row">
                @endif
            @endforeach
        </div>

    </div>
</div>
</body>
</html>
