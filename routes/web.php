<?php

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\HomeController;
use App\Controllers\PostController;
use App\Controllers\AdminController;
use App\Controllers\TestController;

// Test route
$app->get('/test', [TestController::class, 'index']);

// Frontend routes
$app->group('', function (RouteCollectorProxy $group) {
    $group->get('/', [HomeController::class, 'index']);
    $group->get('/post/{id}', [PostController::class, 'show']);
    $group->get('/category/{id}', [PostController::class, 'category']);
    $group->get('/tag/{id}', [PostController::class, 'tag']);
});

// Admin routes
$app->group('/admin', function (RouteCollectorProxy $group) {
    $group->get('', [AdminController::class, 'index']);
    $group->get('/login', [AdminController::class, 'login']);
    $group->post('/login', [AdminController::class, 'authenticate']);
    $group->get('/posts', [AdminController::class, 'posts']);
    $group->get('/posts/create', [AdminController::class, 'createPost']);
    $group->post('/posts/store', [AdminController::class, 'storePost']);
    $group->get('/posts/edit/{id}', [AdminController::class, 'editPost']);
    $group->post('/posts/update/{id}', [AdminController::class, 'updatePost']);
    $group->post('/posts/delete/{id}', [AdminController::class, 'deletePost']);
}); 