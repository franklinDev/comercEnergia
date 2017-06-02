<?php

namespace ComercExperimental\Http\Controllers;

use ComercExperimental\Models\RssFeed;
use Illuminate\Routing\Controller as BaseController;


class PanoramaComercController extends BaseController
{

    private $rss    = null;
    private $base   = '';
    private $uri    = '';

    public function __construct()
    {
        $this->rss = new RssFeed();
        $this->base   = 'http://feeds.folha.uol.com.br';
        $this->uri    = '/ambiente/rss091.xml';
    }

    public function home ()
    {
        $feeds = $this->rss->getRssFeed($this->base, $this->uri, 4);
        return view('home', ['feeds' => $feeds]);
    }


    public function limitPost ($limit)
    {
        $feeds = $this->rss->getRssFeed($this->base, $this->uri, $limit);
        return view('home', ['feeds' => $feeds]);
    }
}
