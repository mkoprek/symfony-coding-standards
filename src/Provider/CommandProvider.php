<?php
declare(strict_types=1);

namespace SymfonyCodingStandards\Provider;

use Composer\Command\BaseCommand;
use Composer\Plugin\Capability\CommandProvider as ComposerCommandProvider;
use SymfonyCodingStandards\Command\CheckCommand;
use SymfonyCodingStandards\Command\FixCommand;
use SymfonyCodingStandards\Command\InstallCommand;

class CommandProvider implements ComposerCommandProvider
{
    /**
     * @return BaseCommand[]
     */
    public function getCommands(): array
    {
        return [
            new CheckCommand(),
            new FixCommand(),
            new InstallCommand(),
        ];
    }
}
