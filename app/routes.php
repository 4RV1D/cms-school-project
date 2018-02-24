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
$app->get('/item[/{id}]', 'GetController:item');

// GET multiple Items from Category or Category->Subcategory or all Items
$app->get('/items[/{category}[/{subcategory}]]', 'GetController:items');



// POST add one Item
$app->post('/create/item', 'PostController:item');

// POST add one Category
/*$app->post('/', 'PostController:category');

// POST add one Subcategory
$app->post('/', 'PostController:subcategory');



// PUT update Item
$app->put('/', 'UpdateController:item');

// PUT update Category
$app->put('/', 'UpdateController:category');

// PUT update Subcategory
$app->put('/', 'UpdateController:subcategory');



// DELETE delete Item
$app->delete('/', 'DeleteController:item');

// DELETE delete Category
$app->delete('/', 'DeleteController:category');

// DELETE delete Subcategory
$app->delete('/', 'DeleteController:subcategory');*/
