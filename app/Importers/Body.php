<?php
namespace AgreableSocialArticlePlugin\Importers;

use Mesh;
use TimberPost;
use Illuminate\Support\Collection;
use AgreableSocialArticlePlugin\Importers\Image;

class Body {

    static function run(TimberPost $post, Collection $blocks) {
		$widget_names = [];
		foreach($blocks->all() as $index => $block)
		{
			$image = new Image($post->id, $index, $block);
			$image->import();
			$widget_names[] = 'image';
		}
        // This is an array of widget names for ACF
        update_post_meta($post->id, 'widgets', serialize($widget_names));
        update_post_meta($post->id, '_widgets', 'post_widgets');
    }
}
