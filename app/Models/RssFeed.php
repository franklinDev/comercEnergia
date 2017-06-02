<?php

namespace ComercExperimental\Models;

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
    public function getRssFeed ($base, $uri, $limit = false)
    {
        $feed  = $this->guzzleInitXml($base, $uri);
        $count = 0;
        $rss   = [];

        if (isset($feed->channel->item)) {
            foreach ($feed->channel->item as $article) {
                $rss[$count]['title']           = $article->title;
                $rss[$count]['link']            = $article->link;
                $rss[$count]['description']     = $article->description;
                $rss[$count]['pubDate']         = ucfirst(strftime('%A, %d de %B de %Y', strtotime($article->pubDate)));
                $count ++;

                //Condição para saber se deve limitar os resultados
                if ($limit !== false) {
                    if ($count == $limit) {
                        return $rss;
                   }
                }
            }
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
