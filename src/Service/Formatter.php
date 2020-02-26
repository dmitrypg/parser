<?php

namespace App\Service;

class Formatter
{
    /**
     * @var
     */
    private $formatter;

    /**
     * Formatter constructor.
     *
     * @param string $type
     * @throws \Exception
     */
    public function __construct(string $type)
    {
        $className = ucfirst($type);
        $class = 'App\Service\Formatters' . '\\' . $className;
        if(class_exists($class)) {
            $this->formatter = new $class();
        } else {
            throw new \Exception('Formatter not found.');
        }
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function format(array $data)
    {
        return $this->formatter->format($data);
    }
}