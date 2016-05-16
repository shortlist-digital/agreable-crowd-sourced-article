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
            $title = "Generated article from /r/$this->subreddit";
            $post = new Mesh\Post($title, 'post');
            return new TimberPost($post);
        }

}
