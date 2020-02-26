<?php

namespace App\Service\Formatters;

/**
 * Class SymfonyParser
 *
 * @package App\Service\Parsers
 */
class Csv implements FormatterInterface
{
    const HEADING = [
        [
            'Product Name',
            'Price'
        ]
    ];

    public function format(array $data)
    {
        $f = fopen('php://memory', 'r+');

        $data = array_merge(self::HEADING, $data);

        foreach ($data as $item) {
            if(isset($item['title'])) {
                $item['title'] = str_replace('”', '', $item['title']);
            }
            fputcsv($f, $item);
        }
        rewind($f);
        return stream_get_contents($f);
    }
}