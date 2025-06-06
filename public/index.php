<?php

use DI\Container;
use Slim\Factory\AppFactory;
use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;

// 显示所有错误
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/../vendor/autoload.php';

try {
    // Load environment variables
    $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();

    // Create Container
    $container = new Container();

    // Initialize database connection
    $capsule = new Capsule;
    $capsule->addConnection([
        'driver'    => 'mysql',
        'host'      => $_ENV['DB_HOST'] ?? 'localhost',
        'database'  => $_ENV['DB_NAME'] ?? 'tech_blog',
        'username'  => $_ENV['DB_USER'] ?? 'root',
        'password'  => $_ENV['DB_PASS'] ?? '',
        'charset'   => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix'    => '',
    ]);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    // Set container to create App with on AppFactory
    AppFactory::setContainer($container);

    // Create App
    $app = AppFactory::create();

    // Add Error Middleware
    $errorMiddleware = $app->addErrorMiddleware(true, true, true);

    // Add routes
    require __DIR__ . '/../routes/web.php';

    $app->run();
} catch (Exception $e) {
    echo "错误：" . $e->getMessage() . "\n";
    echo "错误位置：" . $e->getFile() . " 第 " . $e->getLine() . " 行\n";
    echo "堆栈跟踪：\n" . $e->getTraceAsString() . "\n";
} 