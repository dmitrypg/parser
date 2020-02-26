<?php

namespace App\Service;

/**
 * Class TypedParser
 *
 * @package App\Service
 */
class TypedParser
{
    const HOST_REPLACES = [
        'www' => '',
        '.' => ''
    ];

    /**
     * @param string $url
     * @return mixed
     * @throws \Exception
     */
    public function getWebsiteType(string $url)
    {
        $parsed = parse_url($url);
        if(isset($parsed['host'])) {
            $className = ucfirst(strtr($parsed['host'], self::HOST_REPLACES));
            $class = 'App\Service\Websites' . '\\' . $className;
            if(class_exists($class)) {
                return new $class();
            }
        }
        throw new \Exception('Website Type not found. Please, use correct url');
    }
}