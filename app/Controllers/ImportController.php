<?php
namespace AgreableSocialArticlePlugin\Controllers;

use Herbert\Framework\Http;
use AgreableSocialArticlePlugin\Importers\Image as ImageImporter;
use AgreableSocialArticlePlugin\Importers\Post as PostImporter;
use AgreableSocialArticlePlugin\Importers\Body as BodyImporter;
use Illuminate\Support\Collection;

class ImportController {

    public function run(Http $http)
    {
        $this->subreddit =  $http->get('subreddit');
        $endpoint = $this->build_url($this->subreddit);
        $content_json = file_get_contents($endpoint);
        $content_object = json_decode($content_json);
        $post_importer = new PostImporter($content_object, $this->subreddit);
        $this->post = $post_importer->bootstrap();
        $this->items = $this->filter($content_object->data->children);
        BodyImporter::run($this->post, $this->items);
        header('location: '.get_edit_post_link($this->post->id));
    }

    function build_url($subreddit, $time = "all", $limit = 20)
    {
       return "https://www.reddit.com/r/$subreddit/top.json?sort=top&t=$time&limit=$limit";
    }

    function filter($items_array)
    {
        return Collection::make($items_array)->map(function($item) {
            return $item->data;
        })->filter(function($item) {
            return property_exists($item, 'preview');
        });
    }


}
