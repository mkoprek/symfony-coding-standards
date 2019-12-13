<?php
declare(strict_types=1);

namespace SymfonyCodingStandards;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\Capability\CommandProvider as ComposerCommandProvider;
use Composer\Plugin\Capable;
use Composer\Plugin\PluginInterface;
use SymfonyCodingStandards\Provider\CommandProvider;

class Plugin implements Capable, PluginInterface
{
    public function activate(Composer $composer, IOInterface $io): void
    {
    }

    /**
     * @return mixed[]
     */
    public function getCapabilities(): array
    {
        return [
            ComposerCommandProvider::class => CommandProvider::class,
        ];
    }
}
