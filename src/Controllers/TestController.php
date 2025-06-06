<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class TestController extends Controller
{
    public function index(Request $request, Response $response): Response
    {
        $data = [
            'message' => '测试成功！',
            'time' => date('Y-m-d H:i:s'),
            'php_version' => PHP_VERSION,
            'server_info' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'
        ];
        
        return $this->json($response, $data);
    }
} 