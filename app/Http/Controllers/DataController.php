<?php
namespace App\Http\Controllers;
use App\Models\ResearchUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
class DataController extends Controller
{
    // For User
    public function scopus_article()
    {
		$client = new Client(); //GuzzleHttp\Client
        $url = "https://pd.daffodilvarsity.edu.bd/fgs/repository";
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody());
          // Fetch details for each item and store in an array
    foreach ($responseBody as $item) {
        $detailUrl = "https://pd.daffodilvarsity.edu.bd/fgs/repository/{$item->id}";
        $detailResponse = $client->request('GET', $detailUrl, [
            'verify' => false,
        ]);
        $detailResponseBody = json_decode($detailResponse->getBody());
        
        // Assign cj_name to the item
        $item->cj_name = $detailResponseBody->cj_name;
    }
        //dd($responseBody);
        $researchUpdates = ResearchUpdate::all();
		return view('frontend.scopus_article',compact('responseBody', 'researchUpdates'));
    }
    public function scopus_article_details($id)
    {
		$client = new Client(); //GuzzleHttp\Client
        $url = "https://pd.daffodilvarsity.edu.bd/fgs/repository/$id";
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody());

        $researchUpdates = ResearchUpdate::all();
		return view('frontend.scopus_article_details',compact('responseBody', 'researchUpdates'));
    }
}