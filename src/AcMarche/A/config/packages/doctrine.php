<?php

use Symfony\Config\DoctrineConfig;
use function Symfony\Component\DependencyInjection\Loader\Configurator\env;

return static function (DoctrineConfig $doctrine) {
    $name = 'xx';
    $doctrine->dbal()
        ->connection($name)
        ->url(env('DATABASE_URL')->resolve());

    $em = $doctrine->orm()->entityManager($name);
    $em->connection($name);

    $em->mapping('AcMarcheA')
        ->isBundle(false)
        ->type('attribute')
        ->dir('%kernel.project_dir%/src/AcMarche/A/src/Entity')
        ->prefix('AcMarche\A')
        ->alias('AcMarcheA');
};
