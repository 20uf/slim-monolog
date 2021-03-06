<?php
namespace OsLab\Slim\Monolog;

use Pimple\ServiceProviderInterface;
use Pimple\Container;
use Monolog\Logger;

class Provider implements ServiceProviderInterface
{
    /**
     * Logger settings
     *
     * @var array
     */
    private $settings = [
        'handlers' => [],
        'processors' => [],
    ];

    /**
     * {@inheritdoc}
     */
    public function register(Container $container)
    {
        if (false === array_key_exists('logger', $container->get('settings'))) {
            throw new \InvalidArgumentException('Logger configuration not found !');
        }

        $settings = array_merge($this->settings, $container->get('settings')['logger']);

        $container['logger'] =  new Logger(
                $settings['name'],
                $settings['handlers'],
                $settings['processors']
        );
    }
}