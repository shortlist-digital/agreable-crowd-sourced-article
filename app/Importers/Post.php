<?php
namespace AgreableSocialArticlePlugin\Importers;

use TimberPost;
use Mesh;

class Post {

        function __construct($content_object, $subreddit)
        {
            $this->data = $content_object;
            $this->subreddit = $subreddit;
        }

        function bootstrap()
        {
            $title = "Generated article from /r/$this->subreddit | ".time();
            $post = new Mesh\Post($title, 'post');
            $post->set('header_type', 'standard-hero');
            $post->set('header_display_hero_image', true);
            $post->set('header_display_headline', true);
            $post->set('header_display_sell', true);
            return new TimberPost($post->id);
        }

}
