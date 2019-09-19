<?php

function objectArtwork($object, $maxSize = 300){
    $path = "https://via.placeholder.com/300?text=Image+Not+Found";
    if(isset($object->images) && is_array($object->images)){
        $image = null;
        foreach($object->images as $img){
            if(!$image && $img->width <= $maxSize ){
                $image = $img;
            }
            if($img->width <= $maxSize && $image && $image->width < $img->width){
                $image = $img;
            }
        }
        if($image){
            $path = $image->url;
        }
    }
    return $path;
}

function albumArtist($object){
    $artists = [];
    if(isset($object->artists) && !empty($object->artists)){
        foreach($object->artists as $artist){
            if(isset($artist->name)){
                $artists[] = $artist->name;
            }
        }
    }
    if(empty($artists)){
        $artists[] = "Unknown";
    }
    return implode(", ", $artists);
}
