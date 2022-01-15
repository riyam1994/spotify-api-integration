<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Detailpage extends Controller
{
    public function index($type,$id){
        $getApi = new Search();
        $accessToken = app('App\Http\Controllers\Search')->requestTokenFromSpotify();
        $itemDetail = $this->getItemDetailFromSpotify($type,$id,$accessToken);//print_r($searchResult);die;
        $data = [
            "itemDetail" => $itemDetail,
            "type" => $type
        ];
        return view("detailpage",$data);
    }
    public function getItemDetailFromSpotify($type,$id,$accessToken){
        $httpClient = new \GuzzleHttp\Client();
        $apiurl = "https://api.spotify.com/v1/".$type."/".$id;
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
