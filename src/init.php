<?php

include_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use App\Command\CrawlerCommand;

$application = new Application();

$application->add(new CrawlerCommand());
$application->run();