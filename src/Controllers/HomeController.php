<?php

namespace App\Controllers;

use App\Models\Post;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends Controller
{
    public function index(Request $request, Response $response): Response
    {
        $posts = Post::with(['user', 'category'])
            ->published()
            ->latest()
            ->paginate(10);

        return $this->view($response, 'frontend/home.twig', [
            'posts' => $posts,
            'title' => 'Home'
        ]);
    }
} 