<?php

namespace App\Controllers;

use App\Models\Cms;

class PostController extends Controller
{

  public function item($request, $response) {

    header("Content-type:application/json");

    $data = array('text' => 'Your logged in!');

    $json = json_encode($data);

    return $json;

  }

}
