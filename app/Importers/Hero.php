<?php
namespace AgreableSocialArticlePlugin\Importers;

use Mesh;
use TimberPost;
use Illuminate\Support\Collection;
use AgreableSocialArticlePlugin\Importers\Image;

class Hero {
    static function run(TimberPost $post, Collection $images) {
        $images = new Collection($images);
		// Sort by image width
        $images = $images->sortByDesc(function ($image) {
            return $image[1];
		// Return only image keys as strings
        })->map(function($image, $key) {
           return (string)$key;
		// Return top 3 largest width images
        })->values()->slice(0, 4)->all();
		update_post_meta($post->id, 'hero_images', $images);
		update_post_meta($post->id, '_hero_images', '_basic_hero_images');
		set_post_thumbnail($post->id, $images[0]);
    }
}

