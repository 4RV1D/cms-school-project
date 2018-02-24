<?php

namespace App\Middleware;

use App\Models\Users;

/**
 *
 */
class Authentication extends Middleware
{

  public function __invoke($request, $response, $next) {

    $method = $request->getMethod();

    if ($method == "POST") {

      // Authentication

      if (!isset($_SERVER['PHP_AUTH_USER'])) {

        header('WWW-Authenticate: Basic realm="Restricted API"');
        header('HTTP/1.0 401 Unauthorized');

        die('You have to authenticate to access this area.');

      } else {

        $user = Users::where('username', '=', $_SERVER['PHP_AUTH_USER'])->get();

        if (password_verify($_SERVER['PHP_AUTH_PW'], $user["0"]["original"]["password"])) {
          $response = $next($request, $response);
          return $response;
        } else {
          echo "You have to get authentication access for this area.";
        }

      }

    } else {
      $response = $next($request, $response);
      return $response;
    }

  }

}
