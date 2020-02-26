<?php

namespace App\Service;

use App\Service\Parsers\SymfonyParser;

/**
 * Class Parser
 *
 * @package App\Service
 */
class Parser extends TypedParser
{
    /**
     * Parser constructor.
     *
     * @param string $url
     * @throws \Exception
     */
    public function __construct(string $url)
    {
        $this->type = $this->getWebsiteType($url);
    }

    /**
     * @param $html
     * @return array
     */
    public function parse($html)
    {
        return (new SymfonyParser())->setType($this->type)->parse($html);
    }
}