<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Article;
class DataController extends Controller
{
    public function scopus_article()
    {
		$client = new Client(); //GuzzleHttp\Client
        $url = "https://pd.daffodilvarsity.edu.bd/fgs/repository";
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody());
          
        //dd($responseBody);

		return view('frontend.scopus_article',compact('responseBody'));
    }
    public function scopus_article_details($id)
    {
		$client = new Client(); //GuzzleHttp\Client
        $url = "https://pd.daffodilvarsity.edu.bd/fgs/repository/$id";
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody());
          
		return view('frontend.scopus_article_details',compact('responseBody'));
    }
}