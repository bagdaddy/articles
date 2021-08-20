<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private string $generationUrl = 'https://en.wikipedia.org/api/rest_v1/page/random/summary';
    private string $contentUrl = 'https://en.wikipedia.org/w/api.php?action=parse&page=%s&prop=text&formatversion=2&format=json';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function expired()
    {
        return view('subscription.expired');
    }

    public function show(int $id)
    {
        return view('article', ['articleId' => $id]);
    }

}
