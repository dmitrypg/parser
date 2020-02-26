<?php
namespace App\Service\Parsers;

use App\Service\Websites\WebsiteTypeInterface;

/**
 * Interface ParserInterface
 *
 * @package App\Service\Parsers
 */
interface ParserInterface
{
    /**
     * @param $html
     * @return mixed
     */
    public function parse($html);

    /**
     * @param WebsiteTypeInterface $type
     * @return mixed
     */
    public function setType(WebsiteTypeInterface $type);
}