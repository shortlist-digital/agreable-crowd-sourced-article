<?php
namespace AgreableSocialArticlePlugin\Importers;

use Mesh;
use TimberPost;
use Illuminate\Support\Collection;
use AgreableSocialArticlePlugin\Importers\Image;
use AgreableSocialArticlePlugin\Importers\Hero as HeroImporter;

class Body {

    static function run(TimberPost $post, Collection $blocks) {
        $widget_names = [];
        $candidate_hero_images = [];
        $current_index = 0;
		foreach($blocks->all() as $index => $block)
		{
			$image = new Image($post->id, $current_index, $block);
            $image_import_data = $image->import();
            $widget_names_returned = $image_import_data['widget_names'];
            $candidate_hero_image = $image_import_data['image'];
            $candidate_hero_images[$image_import_data['image_id']] = $candidate_hero_image;
            $widget_names = array_merge($widget_names, $widget_names_returned);
            $current_index = $current_index + count($widget_names_returned);
        }
		$hero_images_collection = Collection::make($candidate_hero_images);
        HeroImporter::run($post, $hero_images_collection);
        // This is an array of widget names for ACF
        update_post_meta($post->id, 'widgets', serialize($widget_names));
        update_post_meta($post->id, '_widgets', 'post_widgets');
    }
}
