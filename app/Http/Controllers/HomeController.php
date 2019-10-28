<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profil($id)
    {
        //Dans une variable, je stocke tous les éléments du modèle User
        $user = User::where('id', $id)->first();
        //Voir afficher article par utilisateurs
        $articles = App\Models\User::find(1)->article;
        //Je crée ma vue index.blade dans le dossier profil, mais besoin d'un tableau de données avec les variables du dessus
        return view('Profil/index', ["user" =>$user]);
    }
}
