<?php

namespace ComercExperimental\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use GuzzleHttp\Client;

class RssFeed extends Authenticatable
{

    /*
     * Retorna os dados do feed de notícias de acordo com a URL
     * @param string $baseUrl
     * @param string $uri
     *
     * @return array $rss
     */
    public function getRssFeed ($base, $uri)
    {
        $feed =  $this->guzzleInitXml($base, $uri);

        foreach ($feed->channel->item as $article) {
            $rss[]['title']           = $article->title;
            $rss[]['link']            = $article->link;
            $rss[]['description']     = $article->description;
            $rss[]['pubDate']         = date('d-m-Y H:i:s', strtotime($article->pubDate));
        }

        return $rss;
    }


    /*
     * Inicia a classe Client do Guzzle
     * @param string $baseUrl
     * @param string $uri
     *
     * @return SimpleXMLElement
     */
    private function guzzleInitXml ($base, $uri)
    {
        $client = new Client([
            'base_uri' => $base,
            'timeout'  => 2.0,
        ]);

        $response = $client->request('GET', $uri);
        $data = $response->getBody()->getContents();
        return simplexml_load_string($data);
    }

}
