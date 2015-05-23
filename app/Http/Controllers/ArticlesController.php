<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ArticlesController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * @return Response
	 */
	public function index()
	{
		$articles = Article::latest('published_at')->published()->get();

		return view('articles.index', compact('articles'));
	}

	/**
	 * @param Article $article
	 * @return Response
	 */
	public function show(Article $article)
	{
		return view('articles.show', compact('article'));
	}

	/**
	 * @return Response
	 */
	public function create()
	{
		return view('articles.create');
	}

	/**
	 * @param ArticleRequest $request
	 * @return Response
	 */
	public function store(ArticleRequest $request)
	{
		Auth::user()->articles()->create($request->all());

		\Session::flash('flash_message', 'Your article has been created!');

		return redirect('articles');
	}

	/**
	 * @param Article $article
	 * @return Response
	 */
	public function edit(Article $article)
	{
		return view('articles.edit', compact('article'));
	}

	/**
	 * @param Article $article
	 * @param ArticleRequest $request
	 * @return Response
	 */
	public function update(Article $article, ArticleRequest $request)
	{
		$article->update($request->all());

		return redirect('articles');
	}

}
