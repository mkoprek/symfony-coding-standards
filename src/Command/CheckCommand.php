<?php
declare(strict_types=1);

namespace SymfonyCodingStandards\Command;

use Composer\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CheckCommand extends BaseCommand
{
    protected function configure(): void
    {
        $this->setName('coding:standards:check')
            ->setDescription('Check coding standards.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        system('composer coding:standards:install');
        system(
            sprintf(
                '%s -ps --colors --standard=ruleset.xml src/ tests/ --ignore=*Kernel.php*,*codeception*',
                'php -d memory_limit=512M vendor/bin/phpcs'
            ),
            $phpCsExitCode
        );
        system(
            'php -d memory_limit=512M vendor/bin/php-cs-fixer fix --config=.php_cs -v --dry-run --using-cache=no',
            $phpCsFixerExitCode
        );
        system('php -d memory_limit=512M vendor/bin/phpstan analyse --ansi --level=7 src/', $phpStanExitCode);

        if ($phpCsExitCode !== 0 || $phpStanExitCode !== 0 || $phpCsFixerExitCode !== 0) {
            return 1;
        }

        return 0;
    }
}
