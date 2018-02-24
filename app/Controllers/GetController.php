<?php

namespace App\Controllers;

use App\Models\Cms;


class GetController extends Controller
{

  public function test($request, $response) {

    header("Content-type:application/json");

    $data = array('text' => 'Lorem Ipsum');

    $json = json_encode($data);

    return $json;

  }

  public function item($request, $response, $args) {

    echo "Getting item with id: " . $args->id;

  }

  public function items($request, $response, $args) {

  }

}
