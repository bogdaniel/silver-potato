<?php

declare(strict_types=1);

use Carbon\Doctrine\DateTimeImmutableType;
use Carbon\Doctrine\DateTimeType;
use Ramsey\Uuid\Doctrine\UuidBinaryType;
use Ramsey\Uuid\Doctrine\UuidType;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\Finder\Finder;

return static function (ContainerConfigurator $containerConfigurator): void {
    $finder = new Finder();
    $finder->directories()->in(__DIR__ . '/../../src')->depth(0)->exclude(['Traits', 'Entity', 'Controller', 'Repository', 'EventSubscriber', 'Service']);

    $mappings = [];
    if ($finder->hasResults()) {
        foreach ($finder as $folder) {
            $moduleName = $folder->getFilename();
            $mappings[$moduleName] = [
                'is_bundle' => false,
                'type' => 'attribute',
                'dir' => sprintf('%%kernel.project_dir%%/src/%s/Framework/Entity', $moduleName),
                'prefix' => sprintf('App\%s\Framework\Entity', $moduleName),
                'alias' => sprintf('App_%s', $moduleName),
            ];
        }
    }
    $containerConfigurator->extension('doctrine', [
        'dbal' => [
            'url' => '%env(resolve:DATABASE_URL)%',
            'default_table_options' => [
                'charset' => 'utf8mb4',
                'collate' => 'utf8mb4_unicode_ci'
            ],
            'types' => [
                'uuid' => UuidType::class,
                'uuid_binary' => UuidBinaryType::class,
                'datetime_immutable' => DateTimeImmutableType::class,
                'datetime' => DateTimeType::class,
            ]
        ],
        'orm' => [
            'auto_generate_proxy_classes' => true,
            'enable_lazy_ghost_objects' => true,
            'naming_strategy' => 'doctrine.orm.naming_strategy.underscore_number_aware',
            'auto_mapping' => true,
            'mappings' => $mappings,
        ],

    ]);
    if ($containerConfigurator->env() === 'test') {
        $containerConfigurator->extension('doctrine', [
            'dbal' => [
                'dbname_suffix' => '_test%env(default::TEST_TOKEN)%',
            ],
        ]);
    }
    if ($containerConfigurator->env() === 'prod') {
        $containerConfigurator->extension('doctrine', [
            'orm' => [
                'auto_generate_proxy_classes' => false,
                'proxy_dir' => '%kernel.build_dir%/doctrine/orm/Proxies',
                'query_cache_driver' => [
                    'type' => 'pool',
                    'pool' => 'doctrine.system_cache_pool',
                ],
                'result_cache_driver' => [
                    'type' => 'pool',
                    'pool' => 'doctrine.result_cache_pool',
                ],
            ],
        ]);
        $containerConfigurator->extension('framework', [
            'cache' => [
                'pools' => [
                    'doctrine.result_cache_pool' => [
                        'adapter' => 'cache.app',
                    ],
                    'doctrine.system_cache_pool' => [
                        'adapter' => 'cache.system',
                    ],
                ],
            ],
        ]);
    }
};
