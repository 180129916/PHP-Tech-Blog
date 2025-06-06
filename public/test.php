<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/../vendor/autoload.php';

try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();
    
    echo "环境变量加载成功\n";
    echo "DB_HOST: " . $_ENV['DB_HOST'] . "\n";
    echo "DB_NAME: " . $_ENV['DB_NAME'] . "\n";
    echo "DB_USER: " . $_ENV['DB_USER'] . "\n";
    
    $db = new PDO(
        "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset=utf8mb4",
        $_ENV['DB_USER'],
        $_ENV['DB_PASS']
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "数据库连接成功！\n";
    
    // 测试查询
    $stmt = $db->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo "数据库中的表：\n";
    print_r($tables);
    
} catch (Exception $e) {
    echo "错误：" . $e->getMessage() . "\n";
    echo "错误位置：" . $e->getFile() . " 第 " . $e->getLine() . " 行\n";
} 