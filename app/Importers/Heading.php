<?php
namespace AgreableSocialArticlePlugin\Importers;

use Mesh;
use TimberPost;
use AgreableSocialArticlePlugin\Importers\Block;

class Heading extends Block {

    function __construct($post_id, $index, $data)
    {
		$this->post_id = $post_id;
		$this->index = $index;
        $this->data = $data;
        $this->widget_names = [];
    }

    public function import()
    {
        $input_string = $this->data->title;
        $title = preg_replace('#\[[^[\]]*(?:(?R)|.*?)+\]#', '', $input_string);
        $title = preg_replace('/\s*\([^\)]*\)/', '', $title);
        $this->set_property('text', 'widget_heading_text', $title);
        $this->set_property('alignment', 'widget_heading_alignment', 'left');
        $this->widget_names[] = 'heading';
        return $this->widget_names;
    }

}
