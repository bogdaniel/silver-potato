<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\EventSubscriber\ThemeTemplateSubscriber;
use App\Service\ThemeManager;
use Symfony\Component\Finder\Finder;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $parameters = $containerConfigurator->parameters();
    $parameters->set('$projectDir' , '%kernel.project_dir%');
//    $parameters->set('easy_media.media_entity', Media::class);

    $finder = new Finder();
    $finder->directories()->in(__DIR__ . '/../src')->depth(0)->exclude(['Traits', 'Entity', 'Controller', 'Repository']);

    $generatePaths = static function ($path) {
        $directories = [
            'DependencyInjection',
            'Entity',
        ];

        $array = [];
        foreach ($directories as $directory) {
            $array[] = $path . '/Framework/' . $directory;
        }

        return $array;
    };

    $generatedPaths = [];
    if ($finder->hasResults()) {
        foreach ($finder as $folder) {
            $generatedPaths[] = $generatePaths($folder->getRealPath());
        }
    }
    $services->defaults()
        ->bind('string $projectDir', '%kernel.project_dir%')
        ->autowire()
        ->autoconfigure();


    $services->load('App\\', __DIR__ . '/../src/')
        ->exclude(array_merge(['/../src/Kernel.php'], ...$generatedPaths));

    $services->set('app.theme_manager', ThemeManager::class)
        ->public();
    $services->set('app.theme_template_subscriber', ThemeTemplateSubscriber::class)
        ->args(
            [
                service('app.theme_manager'),
                service('twig'),
                '$projectDir' => param('$projectDir'),
            ]
        )
        ->tag('kernel.event_subscriber');

//    $services
//        ->set('app.file_manager.domain.service.media_helper', MediaHelper::class)
//        ->args([
//            service('parameter_bag'),
//            service('doctrine.orm.entity_manager'),
//            service('router')
//        ])
//        ->public();

//    $services
//        ->set('app.file_manager.domain.service.media_manager', MediaManager::class)
//
//        ->args([
//            '$filesystem' => service('medias.storage'),
//            '$helper' => service('app.file_manager.domain.service.media_helper'),
//            '$em' => service('doctrine.orm.entity_manager'),
//            '$parameters' => service('parameter_bag'),
//            '$translator' => service('translator')
//        ])
//        ->public();
};
