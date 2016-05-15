<?php
namespace AgreableSocialArticlePlugin\Controllers;

use Herbert\Framework\Http;

class  PanelController {

    public function index()
    {
        return view('@AgreableSocialArticlePlugin/admin/index.twig');
    }

}
