<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Article;
use Auth;

class ArticleController extends Controller
{


    public function index()
    {
        //Dans une variable, je stocke tous les éléments du modèle Article
        $articles = Article::all();
        //Je crée ma vue articles.blade, mais besoin d'un tableau de données avec la variable du dessus
        return view("Articles/articles", ["articles"=>$articles]);
    }

    public function showArticle($id)
    {
        //Dans une variable, je stocke un seul article (first) selon l'id correspondant
        $article = Article::where('id', $id)->first();
        return view("Articles/article", ["article" =>$article]);
    }

    public function create()
    {
        return view('Articles.create');
    }

    public function store(request $request)
    {
        $request->validate([
            'title'=>'required',
            'content' => 'required',
        ]);

        // Article::create($request->all());
        Article::create([
            "title" => $request->title,
            "content" => $request->content,
            "author_id" => Auth::user()->id
        ]);
        return redirect()->route('articles')->with('success', 'Article créé');
    }

    public function delete($id)
    {   
        $article= Article::findOrFail($id)->delete();
        return redirect()->route('articles');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('Articles.edit', ["article"=>$article]);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());
        return redirect()->route('article', ["id"=>$article->id]);
    }
}
