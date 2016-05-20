<?php
namespace AgreableSocialArticlePlugin\Importers;

class Block {

	public function set_property($label, $property, $value)
	{


		$acf_key = "widgets_$this->index";
        $acf_key = $acf_key."_$label";
		update_post_meta($this->post_id, $acf_key, $value);
		update_post_meta($this->post_id, '_' . $acf_key, $property);
 	}

}
