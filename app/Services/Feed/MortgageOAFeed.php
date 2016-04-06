<?php

namespace Poc\Services\Feed;

use GuzzleHttp\Client;

class MortgageOAFeed
{

    protected $baseUri = 'http://aws.bankrate.com/';

    protected function getResponse($uri)
    {
        $client = new Client(['base_uri' => $this->baseUri]);

        $response = $client->get($uri);

        return (string)$response->getBody();
    }

    public function get($productIds, $marketId = null)
    {
        $feedResponse = $this->getResponse('oa/mortgage/' . $productIds . ($marketId ? '/' . $marketId : ''));

        if (substr($feedResponse, 0, 9) == '<response') {
            $xml = simplexml_load_string($feedResponse);

            return json_decode(json_encode($xml), TRUE);
        }

        return json_decode($feedResponse);
    }

}
