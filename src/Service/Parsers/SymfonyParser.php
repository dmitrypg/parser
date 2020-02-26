<?php

namespace App\Service\Parsers;

use Symfony\Component\DomCrawler\Crawler;
use App\Service\Websites\WebsiteTypeInterface;

/**
 * Class SymfonyParser
 *
 * @package App\Service\Parsers
 */
class SymfonyParser implements ParserInterface
{
    /**
     * @var
     */
    private $type;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param WebsiteTypeInterface $type
     * @return $this
     */
    public function setType(WebsiteTypeInterface $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param $html
     * @return array
     */
    public function parse($html)
    {
        $crawler = new Crawler($html);

        return $crawler->filter($this->type->getBlockElementClass())->each(function ($node) {

            $elements = $this->type->getDataElementsClasses();

            array_walk($elements, function(&$class, $type) use($node) {
                $class = $node->filter($class)->first()->text();
            });

            return $elements;
        });
    }
}