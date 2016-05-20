<?php
namespace AgreableSocialArticlePlugin\Importers;

use Mesh;
use TimberPost;
use AgreableSocialArticlePlugin\Importers\Block;

class Image extends Block {

	function __construct($post_id, $index, $data)
	{
		$this->post_id = $post_id;
		$this->index = $index;
		$this->data = $data;
	}

	public function import()
	{
		$image = new Mesh\Image($this->data->preview->images[0]->source->url);
		$this->set_property('image', 'widget_image_image', $image->id);
		$this->set_property('border', 'widget_image_border', 0);
		$this->set_property('width', 'widget_image_width', 'large');
		$this->set_property('position', 'widget_image_position', 'center');
		$this->set_property('crop', 'widget_image_crop', 'original');
		$this->set_property('caption', 'widget_image_caption', $this->caption());
	}

	public function caption()
	{
		return "Credit: <a href=\"".$this->build_url()."\">".$this->data->author."</a>";

	}

	public function build_url()
	{
		return "https://www.reddit.com/";
	}

}
