<?php
namespace AgreableSocialArticlePlugin\Importers;

use Mesh;
use TimberPost;
use Illuminate\Support\Collection;
use AgreableSocialArticlePlugin\Importers\Image;

class Body {

    static function run(TimberPost $post, Collection $blocks) {
        $widget_names = [];
        $current_index = 0;
		foreach($blocks->all() as $index => $block)
		{
			$image = new Image($post->id, $current_index, $block);
			$widget_names_returned = $image->import();
            $widget_names = array_merge($widget_names, $widget_names_returned);
            $current_index = $current_index + count($widget_names_returned);
        }
        // This is an array of widget names for ACF
        update_post_meta($post->id, 'widgets', serialize($widget_names));
        update_post_meta($post->id, '_widgets', 'post_widgets');
    }
}
