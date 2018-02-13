<?php

$container["GetController"] = function($container) {
  return new \App\Controllers\GetController($container);
};

$container["PostController"] = function($container) {
  return new \App\Controllers\PostController($container);
};

$container["UpdateController"] = function($container) {
  return new \App\Controllers\UpdateController($container);
};

$container["DeleteController"] = function($container) {
  return new \App\Controllers\DeleteController($container);
};


$app->get('/', 'GetController:test')->setName('get');
