<?php
namespace AgreableSocialArticlePlugin\Controllers;

use Herbert\Framework\Http;

class ImportController {

    public function run(Http $http)
    {
		$this->subreddit =  $http->get($field['subreddit']);

    }

    function build_url($subreddit, $time = "all", $limit = 20)
    {
       return "https://www.reddit.com/r/$subreddit/top.json?sort=top&t=$time&limit=$limit";
    }
}
