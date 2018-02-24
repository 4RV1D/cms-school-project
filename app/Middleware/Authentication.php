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

        // Get user with username entered
        $user = Users::where('username', '=', $_SERVER['PHP_AUTH_USER'])->get();

        // Verify the password with password_verify
        if (password_verify($_SERVER['PHP_AUTH_PW'], $user["0"]["original"]["password"])) {

          // User logged in
          $response = $next($request, $response);
          return $response;

        } else {

          // Authentication failed
          echo "You have to get authentication access for this area.";

        }

      }

    } else {

      // GET method needs no login
      $response = $next($request, $response);
      return $response;

    }

  }

}
