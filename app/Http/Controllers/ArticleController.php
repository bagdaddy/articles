<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class ArticleController extends Controller
{
    public function index(ArticleService $articleService): JsonResponse
    {
        return response()->json($articleService->getList(15));
    }

    public function show(int $id, ArticleService $articleService): JsonResponse
    {
        return response()->json($articleService->getArticle($id));
    }
}
