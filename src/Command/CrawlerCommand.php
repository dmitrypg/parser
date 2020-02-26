<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use App\Service\HttpClient;
use App\Service\Parser;
use App\Service\Formatter;

/**
 * Class CrawlerCommand
 *
 * @package App\Command
 */
class CrawlerCommand extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'app:crawler';

    const URL_PARAM = 'url';
    const URL_PARAM_DESCRIPTION = 'Stadium good website url';

    protected function configure()
    {
        $this->addArgument(
            self::URL_PARAM, InputArgument::REQUIRED, self::URL_PARAM_DESCRIPTION
        );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Crawl starting...',
        ]);

        $websiteUrl = $input->getArgument(self::URL_PARAM);

        $html = (new HttpClient())->getHtml($websiteUrl);

        $data = (new Parser($websiteUrl))->parse($html);

        $output->writeln((new Formatter('csv'))->format($data));
    }
}