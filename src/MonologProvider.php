<?php
namespace Oslab\SlimMonolog;

use Pimple\ServiceProviderInterface;
use Pimple\Container;
use Monolog\Logger;

class MonologProvider implements ServiceProviderInterface
{
    /**
     * Logger settings
     *
     * @var array
     */
    private $settings = [
        'level' => Logger::DEBUG,
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

        $container['logger'] = new Logger(
            $settings['name'],
            $settings['handlers'],
            $settings['processors']
        );

    }
}