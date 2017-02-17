##usage

```php
<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Create a new Slim Application
$app = new \Slim\App([
    'settings' => [
        'logger' => [
            'name' => 'my_logger',
            'handlers' => [
                new StreamHandler(__DIR__'./logs/log.txt', Logger::DEBUG)
            ]
        ]
    ]
]);

// Fetch Container
$container = $app->getContainer();

// Register Monolog Provider
$container->register(new \OsLab\Slim\Monolog\Provider);

// Run App
$app->run();
```
