<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

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
}
