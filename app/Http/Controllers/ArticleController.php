<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Article;
use App\User;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $articles = Article::orderByDesc('publish_year')->get();
		return view('article.index',compact('articles'));
    }
    public function details($id)
    {
		$articles = Article::find($id);
		return view('article.details',compact('articles','id'));
    }

    public function paper()
    {
        //$articles = Article::all()->toArray();
		return view('article.paper');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('article.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article([
            'user_id'=>$request->get('user_id'),
            'title'=>$request->get('title'),
            'abstract'=>$request->get('abstract'),
             'keywords'=>$request->get('keywords'),
             'authors'=>$request->get('authors'),
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
            'journal_name'=>$request->get('journal_name'),
            'journal_link'=>$request->get('journal_link'),
            'publish_year'=>$request->get('publish_year'),
            'indexing'=>$request->get('indexing')
            ]);
            $article->save();
            return redirect('/article');
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
        $article = Article::find($id);
		return view('article.edit',compact('article','id'));
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
        $article = Article::find($id);
        $article->title = $request->get('title');
        $article->abstract = $request->get('abstract');
        $article->keywords = $request->get('keywords');
        $article->authors = $request->get('authors');
        $article->phone = $request->get('phone');
        $article->email = $request->get('email');
        $article->journal_name = $request->get('journal_name');
        $article->journal_link = $request->get('journal_link');
        $article->publish_year = $request->get('publish_year');
        $article->indexing = $request->get('indexing');
        $article->save();
		return redirect('/article');
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
        $article = Article::find($id);
        $article->delete();
        return redirect('/article');
    }
}
