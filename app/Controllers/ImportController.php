<?php
namespace AgreableSocialArticlePlugin\Controllers;

use Herbert\Framework\Http;
use AgreableSocialArticlePlugin\Importers\Image as ImageImporter;
use AgreableSocialArticlePlugin\Importers\Post as PostImporter;

class ImportController {

    public function run(Http $http)
    {
        $this->subreddit =  $http->get('subreddit');
        $endpoint = $this->build_url($this->subreddit);
        $content_json = file_get_contents($endpoint);
        $content_object = json_decode($content_json);
        $post_importer = new PostImporter($content_object, $this->subreddit);
        $this->post = $post_importer->bootstrap();
        //$this->filter($content_object->data->children);
        echo "<pre>";
        print_r($this->post);die;

    }

    function build_url($subreddit, $time = "all", $limit = 20)
    {
       return "https://www.reddit.com/r/$subreddit/top.json?sort=top&t=$time&limit=$limit";
    }

    function filter($items_array)
    {
        foreach ($items_array as $item)
        {
            if (property_exists($item->data, 'post_hint')) {
                $hint = $item->data->post_hint;
                switch ($hint) {
                    case 'image':
                        new ImageImporter($this->post, $image_data);
                    default:
                        //nothing
                }

            } else {
                echo "NO POST HINT ------------- </br>";
                echo "<pre>";
                print_r($item->data);
                echo "</pre>";
            }
        }
        //echo "<pre>";
        //print_r($items_array);
        die;
    }
}
