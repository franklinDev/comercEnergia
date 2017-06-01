<?php

namespace ComercExperimental\Http\Controllers;

use ComercExperimental\Models\RssFeed;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PanoramaComercController extends BaseController
{

    private $rss = null;

    public function __construct()
    {
        $this->rss = new RssFeed();
    }

    public function home ()
    {
        $feeds = $this->rss->getRssFeed('http://feeds.folha.uol.com.br', '/ambiente/rss091.xml', 4);
        return view('home', ['feeds' => $feeds]);
    }


    public function limitPost ($limit)
    {
        $feeds = $this->rss->getRssFeed('http://feeds.folha.uol.com.br', '/ambiente/rss091.xml', $limit);
        return view('home', ['feeds' => $feeds]);
    }
}
