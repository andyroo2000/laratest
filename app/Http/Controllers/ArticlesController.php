<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticlesController extends Controller {

	public function index()
	{
		$articles = Article::latest('published_at')->published()->get();

		return view('articles.index', compact('articles'));
	}

	public function show($id)
	{
		$article = Article::findOrFail($id);

		dd($article->published_at);

		return view('articles.show', compact('article'));
	}

	public function create()
	{
		return view('articles.create');
	}

	public function store(CreateArticleRequest $request)
	{
		Article::create($request->all());

		return redirect('articles');
	}

	public function edit($id)
	{
		$article = Article::findOrNew($id);
		return view('articles.edit', compact('article'));
	}

	public function update($id, Request $request)
	{
		$article = Article::findOrNew($id);

		$article->update($request->all());

		return redirect('articles');
	}

}
