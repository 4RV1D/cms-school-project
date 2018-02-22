<?php

namespace App\Middleware;

/**
 *
 */
class Authentication extends Middleware
{

  public function __invoke($request, $response, $next) {

    echo "Authentication";

    $response = $next($request, $response);
    return $response;

  }

}
