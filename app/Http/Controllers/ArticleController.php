<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//importer la class articles
use App\Models\Article;
class ArticleController extends Controller
{
    public function liste_article()
        {
            $articles = Article::all();
            return view('articles.listes', compact('articles'));
        }

    public function ajouter_article()
        {
            return view('articles.ajouter');
        }

        // function pour l'ajout
        public function add_article(Request $request)
            {
                $request->validate([
                    'nom' => 'required',
                    'description' => 'required',
                    'image' => 'required',
                    'a_la_une' => 'required|boolean',

                ]);
                // instance de l'article
                $article = new Article();
                $article->nom = $request->nom;
                $article->description = $request->description;
                $article->image = $request->image;
                $article->date_création = $request->input('date_création', now());
                $article->a_la_une = $request->a_la_une;
                // Enregistrer dans la base de donnée
                $article->save();
                return redirect('/ajouter')->with('status', 'l\'article a bien été ajouter');
            }

        public function update_article($id)
            {
                $articles = Article::find($id);
                return view('articles.update', compact('articles'));
            }

}
