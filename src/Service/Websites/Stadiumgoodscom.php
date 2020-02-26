<?php

namespace App\Service\Websites;

/**
 * Class Stadiumgoodscom
 *
 * @package App\Service\Websites
 */
class Stadiumgoodscom implements WebsiteTypeInterface
{
    /**
     * @return string
     */
    public function getBlockElementClass()
    {
        return '.product-info';
    }

    /**
     * @return array
     */
    public function getDataElementsClasses()
    {
        return [
            'title' => '.product-name',
            'price' => '.price',
        ];
    }
}