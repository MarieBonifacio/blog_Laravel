<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Models\Article;

class checkUser 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $id
     * @return mixed
     */
    public function handle($request, Closure $next, $id=null)
    {
        $response = $next($request);
        dd($id);

        $user = Auth::user();
        // $article = Article::findOrFail();

        return $response;
        // $user = $request->user();
        // $article = $request->article();

        // if($user->id == $article->author_id)
        // {
        // return $next($request);
        // }
        // return new RedirectResponse(url('/'));
    }

}