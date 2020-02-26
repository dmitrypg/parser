<?php

namespace App\Service\Clients;

use Symfony\Component\HttpClient\HttpClient;

/**
 * Class SymfonyHttpClient
 *
 * @package App\Service\Clients
 */
class SymfonyHttpClient implements HttpClientInterface
{
    /**
     * @var string
     */
    private $url = '';

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return mixed|string
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getHtml()
    {
        $httpClient = HttpClient::create();

        $response = $httpClient->request('GET', $this->getUrl());

        if(200 != $response->getStatusCode()) {
            return '';
        }

        return $response->getContent();
    }
}