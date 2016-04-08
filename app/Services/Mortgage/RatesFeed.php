<?php

namespace Poc\Services\Mortgage;

use GuzzleHttp\Client;

class RatesFeed
{

    protected $baseUri = 'http://www.bankrate.com/';

    protected function getResponse($uri)
    {
        $client = new Client(['base_uri' => $this->baseUri]);

        $response = $client->get($uri);

        return (string)$response->getBody();
    }

    public function get($queryString)
    {
        return $this->getResponse('ajax/dynamic-content/rate-tables/rt-mortgage-hp-dynamic.aspx?' . $queryString);
    }

}
