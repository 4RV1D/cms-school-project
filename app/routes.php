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


$app->get('/', 'GetController:test');


// GET one Item
$app->get('/api/item[/{id}]', 'GetController:item');

// GET multiple Items from Category or Category->Subcategory or all Items
$app->get('/api/items[/{category}[/{subcategory}]]', 'GetController:items');

// POST add one Item
$app->('/api/{apikey}', 'PostController:item');

// POST add one Category
$app->('/', 'PostController:category');

// POST add one Subcategory
$app->('/', 'PostController:subcategory');

// POST update Item
$app->('/', 'UpdateController:item');

// POST update Category
$app->('/', 'UpdateController:category');

// POST update Subcategory
$app->('/', 'UpdateController:subcategory');

// POST delete Item
$app->('/', 'DeleteController:item');

// POST delete Category
$app->('/', 'DeleteController:category');

// POST delete Subcategory
$app->('/', 'DeleteController:subcategory');
