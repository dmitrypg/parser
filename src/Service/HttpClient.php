<?php

namespace App\Service;

use App\Service\Clients\SymfonyHttpClient;

/**
 * Class HttpClient
 *
 * @package App\Service
 */
class HttpClient
{
    /**
     * @param string $url
     * @return mixed|string
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getHtml(string $url)
    {
        return (new SymfonyHttpClient())->setUrl($url)->getHtml();
    }
}