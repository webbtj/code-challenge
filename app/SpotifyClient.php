<?php

namespace App;

use \GuzzleHttp\Client;

class SpotifyClient extends Client{
  private $client;
  private $secret;
  private $endpoint = 'https://api.spotify.com/v1/';
  private $bearerToken;

  public function __construct(){
      parent::__construct();
      $this->client = env('SPOTIFY_CLIENT');
      $this->secret = env('SPOTIFY_SECRET');
  }

  private function setAccessToken(){
      if($this->bearerToken){
          return $this->bearerToken;
      }

      // I would ideally store this bearer token, but given the instructions
      // state no database, I assume that means no redis or nosql either
      // which would leave file system and... yuck
      // TODO: write this token to file system (maybe)

      $response = $this->request('POST', 'https://accounts.spotify.com/api/token', [
          'headers' => [
              'Authorization' => 'Basic ' . base64_encode(sprintf('%s:%s', $this->client, $this->secret))
          ],
          'form_params' => [
              'grant_type' => 'client_credentials'
          ]
      ]);

      if(200 === $response->getStatusCode()){
          $body = json_decode($response->getBody()->__toString());
          if('Bearer' === $body->token_type){
              $this->bearerToken = $body->access_token;
              return $this->bearerToken;
          }
      }

      return null;
  }

  private function signed_request($method, $path, $args = null){
      $requestBody = null;
      $url = $this->endpoint . $path;
      if($args){
          if('GET' === $method){
              $url .= '?' . http_build_query($args);
          }else{
              $requestBody = ['form_params' => $args];
          }
      }
      return $this->request($method, $url, [
         'headers' => [
             'Authorization' => 'Bearer ' . $this->bearerToken
         ],
         $requestBody
      ]);
  }

  public function search($term){
      if(!$term){
          // TODO: throw error
      }

      if(!$this->setAccessToken()){
          // TODO: throw error
      }

      $response = $this->signed_request('GET', 'search', [
          'q' => $term,
          'type' => implode(',', ['album', 'artist', 'track'])
      ]);

      // TODO: Check response header, throw errors, etc.

      return json_decode($response->getBody()->__toString());
  }

  public function getArtist($id){
      if(!$id){
          // TODO: throw error
      }

      if(!$this->setAccessToken()){
          // TODO: throw error
      }

      $response = $this->signed_request('GET', 'artists/' . $id);

      // TODO: Check response header, throw errors, etc.

      return json_decode($response->getBody()->__toString());
  }

  public function getAlbum($id){
      if(!$id){
          // TODO: throw error
      }

      if(!$this->setAccessToken()){
          // TODO: throw error
      }

      $response = $this->signed_request('GET', 'albums/' . $id);

      // TODO: Check response header, throw errors, etc.

      return json_decode($response->getBody()->__toString());
  }

  public function getTrack($id){
      if(!$id){
          // TODO: throw error
      }

      if(!$this->setAccessToken()){
          // TODO: throw error
      }

      $response = $this->signed_request('GET', 'tracks/' . $id);

      // TODO: Check response header, throw errors, etc.

      return json_decode($response->getBody()->__toString());
  }



  public function test(){
      return [$this->client, $this->secret];
  }
}
