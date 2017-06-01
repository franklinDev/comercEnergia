<?php

namespace ComercExperimental\Http\Controllers;

use ComercExperimental\Models\RssFeed;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PanoramaComercController extends BaseController
{
   public function home ()
   {
        $obj = new RssFeed();
        $feeds = $obj->getRssFeed('http://feeds.folha.uol.com.br', '/ambiente/rss091.xml');
        return view('home', ['feeds' => $feeds]);
   }
}
