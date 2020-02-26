<?php
namespace App\Service\Clients;

/**
 * Interface HttpClientInterface
 *
 * @package App\Service\Clients
 */
interface HttpClientInterface
{
    /**
     * @param $url
     * @return mixed
     */
    public function setUrl($url);

    /**
     * @return mixed
     */
    public function getHtml();
}