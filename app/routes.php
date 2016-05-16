<?php namespace AgreableSocialArticlePlugin;

/** @var \Herbert\Framework\Router $router */

$router->post([
  'as'   => 'startImport',
  'uri'  => '/social-article/import',
  'uses' => __NAMESPACE__ . '\Controllers\ImportController@run'
]);
