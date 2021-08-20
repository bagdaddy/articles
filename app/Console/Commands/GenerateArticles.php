<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;

class GenerateArticles extends Command
{

    private string $generationUrl = 'https://en.wikipedia.org/api/rest_v1/page/random/summary';
    private string $contentUrl = 'https://en.wikipedia.org/w/api.php?action=parse&page=%s&prop=text&formatversion=2&format=json&explaintext=true';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:generateArticles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates articles';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $userAgent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
        curl_setopt($ch, CURLOPT_URL, $this->generationUrl);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        for($i = 0; $i < 15; $i++) {
            $response = curl_exec($ch);
            $article = json_decode($response, true);

            $text = file_get_contents(sprintf($this->contentUrl, urlencode($article['title'])));
            $textObj = json_decode($text, true);
            Article::create([
                'title' => $article['displaytitle'],
                'summary' => $article['extract'],
                'thumbnail' => $article['thumbnail']['source']
            ]);
        }

        return 0;
    }
}
