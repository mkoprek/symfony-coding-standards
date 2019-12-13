<?php
declare(strict_types=1);

namespace SymfonyCodingStandards\Command;

use Composer\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FixCommand extends BaseCommand
{
    protected function configure(): void
    {
        $this->setName('coding:standards:fix')
            ->setDescription('Fix errors in coding standards.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        system('composer coding:standards:install');
        system('vendor/bin/phpcbf --standard=ruleset.xml src/ tests/ --ignore=*Kernel.php*');
        system('vendor/bin/php-cs-fixer fix --config=.php_cs -v --using-cache=no');

        return 0;
    }
}
