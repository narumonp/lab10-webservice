<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Runnerscontroller extends Controller
{
    private $api = "http://runnerx.dev/api/";

    public function index()
    {
      $client = new \GuzzleHttp\Client();
      $call = "calculate";
      $response = $client->request('GET', "{$this->api}{$call}", [
          'form_params' => []
      ]);
      $resBody = $response->getBody();
      $res = json_decode($resBody);


      return view('runnerspeed.input', [
          'statusCode' => $response->getStatusCode(),
          'responseHeader' => $response->getHeader('content-type')[0],
          'success' => !is_null($res)? $res->success: false,
          'data' => !is_null($res)?$res->data: null,
          'resBody' => $response->getBody()
      ]);

      console.log("test");
    }




    public function show()
    {

    }

    public function create() {

    }
}
