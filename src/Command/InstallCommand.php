<?php
declare(strict_types=1);

namespace SymfonyCodingStandards\Command;

use Composer\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InstallCommand extends BaseCommand
{
    protected function configure(): void
    {
        $this->setName('coding:standards:install')
            ->setDescription('Install PHPCS coding standards config.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        copy('./vendor/mkoprek/symfony-coding-standards/ruleset.xml', './ruleset.xml');
        copy('./vendor/mkoprek/symfony-coding-standards/.php_cs', './.php_cs');

        return 0;
    }
}
