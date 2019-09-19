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
    <div class="container">
        <div class="row">
            <div class="col">
                <img class="img-thumbnail" src="{{objectArtwork($artist, 1024)}}" />
            </div>
            <div class="col">
                <p>
                    <strong>Artist:</strong> {{$artist->name}}<br>
                    <strong>Popularity:</strong> {{$artist->popularity}}<br>
                    <strong>Followers:</strong> {{$artist->followers->total}}<br>
                    <a href="{{$artist->uri}}">Play on Spotify</a><br>
                </p>
            </div>
        </div>
    </div>


</div>
</body>
</html>
