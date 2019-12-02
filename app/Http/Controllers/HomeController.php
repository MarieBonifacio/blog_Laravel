<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
use App\Models\Article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $articles = Article::all();
        return view('home', ["articles"=>$articles]);
    }

    public function profil($id)
    {
        //Dans une variable, je stocke tous les éléments du modèle User
        $user = User::where('id', $id)->first();
        //Je crée ma vue index.blade dans le dossier profil, mais besoin d'un tableau de données avec les variables du dessus
        return view('Profil/index', ["user" =>$user]);
    }
}
