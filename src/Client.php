<?php

namespace Cyphp\Goo\Gl;

use GuzzleHttp\Client as GuzzleClient;

class Client
{
    protected $apiKey;

    public function __construct(string $apiKey = null, string $endPointUrl = 'https://www.googleapis.com/urlshortener/v1/url')
    {
        $this->setApiKey($apiKey);
        $this->setEndPointUrl($endPointUrl);
    }

    public function setApiKey(string $apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    public function setEndPointUrl(string $endPointUrl)
    {
        $this->endPointUrl = $endPointUrl;

        return $this;
    }

    public function shorten(string $longUrl)
    {
        $client = new GuzzleClient();


        try {
            $response = $client->request('POST', $this->endPointUrl, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'query' => [
                    'key' => $this->apiKey,
                ],
                'json' => [
                    'longUrl' => $longUrl,
                ],
            ]);

            return json_decode($response->getBody(), true)['id'];
        } catch (\Exception $e) {
        }
    }
}
