<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Controller
{
    protected function view(Response $response, string $template, array $data = []): Response
    {
        $view = new \Slim\Views\Twig(__DIR__ . '/../../src/Views', [
            'cache' => false,
        ]);
        
        return $view->render($response, $template, $data);
    }

    protected function json(Response $response, $data, int $status = 200): Response
    {
        $response->getBody()->write(json_encode($data));
        
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($status);
    }

    protected function redirect(Response $response, string $url, int $status = 302): Response
    {
        return $response
            ->withHeader('Location', $url)
            ->withStatus($status);
    }
} 