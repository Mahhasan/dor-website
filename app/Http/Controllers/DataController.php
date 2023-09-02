<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Article;
class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paper()
    {
		//$articles = Article::all()->toArray();
		$articles = Article::orderByDesc('publish_year')->get();
		return view('paper',compact('articles'));
    }

    public function scopus_article()
    {
		$client = new Client(); //GuzzleHttp\Client
        $url = "https://pd.daffodilvarsity.edu.bd/fgs/repository";
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody());
          
        //dd($responseBody);

		return view('scopus_article',compact('responseBody'));
    }
    public function scopus_article_details($id)
    {
		$client = new Client(); //GuzzleHttp\Client
        $url = "https://pd.daffodilvarsity.edu.bd/fgs/repository/$id";
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody());
          
		return view('scopus_article_details',compact('responseBody'));
    }

    
    public function research_coordinator(){
        return view('research-coordinator');
    }
    public function ranking(){
        return view('ranking');
    }
    public function about(){
        return view('about');
    }
    public function photo(){
        return view('photo');
    }
    public function details($id)
    {
		$articles = Article::find($id);
		return view('details',compact('articles','id'));
    }
    /*public function news()
    {
		return view('news.news_one');
    }*/
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}