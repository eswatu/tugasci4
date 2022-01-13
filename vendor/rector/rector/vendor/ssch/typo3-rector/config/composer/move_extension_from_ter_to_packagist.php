<?php

declare (strict_types=1);
namespace RectorPrefix20210827;

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/../config.php');
    $services = $containerConfigurator->services();
    $additionalComposerExtensions = [new \Rector\Composer\ValueObject\RenamePackage('typo3-ter/social_auth', 'kalypso63/social_auth')];
    $allComposerExtensions = \array_merge($composerExtensions, $additionalComposerExtensions);
    $services->set('move_from_ter_to_packagist')->class(\Rector\Composer\Rector\RenamePackageComposerRector::class)->call('configure', [[\Rector\Composer\Rector\RenamePackageComposerRector::RENAME_PACKAGES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline($allComposerExtensions)]]);
};