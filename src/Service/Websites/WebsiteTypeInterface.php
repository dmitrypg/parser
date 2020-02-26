<?php

namespace App\Service\Websites;

/**
 * Interface WebsiteTypeInterface
 *
 * @package App\Service\Websites
 */
interface WebsiteTypeInterface
{
    /**
     * @return mixed
     */
    public function getBlockElementClass();

    /**
     * @return mixed
     */
    public function getDataElementsClasses();
}