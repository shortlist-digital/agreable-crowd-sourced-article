<?php namespace AgreableSocialArticlePlugin;

/** @var \Herbert\Framework\Router $router */

$router->get([
  'as'   => 'startImport',
  'uri'  => '/social-article/import',
  'uses' => __NAMESPACE__ . '\Controllers\ImportController@run'
]);
