<?php namespace AgreableSocialArticlePlugin;
/** @var \Herbert\Framework\Panel $panel */

$panel->add([
    'type'   => 'panel',
    'as'     => 'socialArticlePanel',
    'title'  => 'Social Article',
    'slug'   => 'social-article-index',
    'icon'   => 'dashicons-share',
    'uses'   => __NAMESPACE__ . '\Controllers\PanelController@index'
]);
