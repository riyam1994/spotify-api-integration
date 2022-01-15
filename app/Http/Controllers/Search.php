<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Search extends Controller
{
    public function getserchterm(Request $req){
        //post data from the search form in homepage
        $req->validate([
            'searchquery' => 'required'
        ]);
        $searchQuery =  $req->input('searchquery');
        $accessToken = $this->requestTokenFromSpotify();
        if($accessToken == 'invalid_client'){
            $data['error'] = 1;
        }
        else{
            $searchResult = $this->getSearchResultFromSpotify($searchQuery,$accessToken);//print_r($searchResult);die;
            $data = [
                "searchquery" => $searchQuery,
                "searchResult" => $searchResult
            ];
        }
        
        return view("search",$data);
    }
    public function requestTokenFromSpotify(){
        // function to get the Tccess Token from spotify
        $client_id = 'you client id'; //client id from the spotify web app
        $client_secret = 'your secret key';//client secret from the spotify web app
        $apiUrl = "https://accounts.spotify.com/api/token";

        //initializing curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,            $apiUrl );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($ch, CURLOPT_POST,           1 );
        curl_setopt($ch, CURLOPT_POSTFIELDS,     'grant_type=client_credentials' ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 

        $result=curl_exec($ch);
        
        
        $result_decoded = json_decode($result, true);
        if(isset($result_decoded['access_token'])){
            $token = $result_decoded['access_token'];
        }
        else{
            $token = $result_decoded['error'];
        }
        
        return $token;
    }
    public function getSearchResultFromSpotify($searchQuery,$accessToken){
        //api call to spotify to list artists, albums, or tracks according to the search term
        $httpClient = new \GuzzleHttp\Client();
        $apiurl = "https://api.spotify.com/v1/search?q=".$searchQuery."&type=track%2Cartist%2Calbum&";
        $res = $httpClient->request('GET',$apiurl,[
            'headers' => [
               'Authorization' => ['Bearer '.$accessToken],
               'Content-Type' => ['application/json'] 
            ]
        ]);
        $response = json_decode($res->getBody(),true);
        return $response;
    }
}
