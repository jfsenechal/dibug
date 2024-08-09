<?php

use Symfony\Config\DoctrineConfig;
use function Symfony\Component\DependencyInjection\Loader\Configurator\env;

return static function (DoctrineConfig $doctrine) {
    $name = 'cap';
    $doctrine->dbal()
        ->connection($name)
        ->url(env('DATABASE_URL_B')->resolve());

    $em = $doctrine->orm()->entityManager($name);
    $em->connection($name);

    $em->mapping('AcMarcheB')
        ->isBundle(false)
        ->type('attribute')
        ->dir('%kernel.project_dir%/src/AcMarche/B/src/Entity')
        ->prefix('AcMarche\B')
        ->alias('AcMarcheB');
};
