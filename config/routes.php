<?php

declare(strict_types=1);

use Symfony\Component\Finder\Finder;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return static function (RoutingConfigurator $routingConfigurator): void {
    $finder = new Finder();
    $finder->directories()->in(__DIR__ . '/../src')->depth(0)->exclude(['Traits', 'Entity', 'Controller', 'Repository', 'EventSubscriber', 'Service']);

    if ($finder->hasResults()) {
        foreach ($finder as $folder) {
            $routingConfigurator->import([
                'path' => sprintf('../src/%s/Framework/Controller/', $folder->getFilename()),
                'namespace' => sprintf('App\%s\Framework\Controller', $folder->getFilename()),
            ], 'attribute');
        }
    }
};
