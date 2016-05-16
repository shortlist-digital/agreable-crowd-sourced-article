<?php
namespace AgreableSocialArticlePlugin\Importers;

use Mesh;
use TimberPost;

class Image {

    function __construct(TimberPost $post, $image_data)
    {
        $this->post = $post;
        $this->add_image_block($image_data);
    }

    function add_image_block($image_data) {

    }

}
