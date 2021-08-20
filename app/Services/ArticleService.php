<?php
namespace App\Services;

use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleService
{
    public function getList(int $perPage)
    {
        return Article::paginate($perPage);
    }

    public function getArticle(int $id)
    {
        return Article::where('id', '=', $id)->first();
    }
}
