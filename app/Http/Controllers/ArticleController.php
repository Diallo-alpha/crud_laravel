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

    public function ajouter_articles()
        {
            return view('articles.ajouter');
        }

        // function pour l'ajout
        public function ajouter_article(Request $request)
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
                return redirect('/')->with('status', 'l\'article a bien été ajouter');
            }

        public function mise_à_jour_article($id)
            {
                $articles = Article::find($id);
                return view('articles.update', compact('articles'));
            }

        public function mise_à_jour_article_traitement(Request $request)
            {
                $request->validate([
                    'nom' => 'required',
                    'description' => 'required',
                    'image' => 'required',
                    'a_la_une' => 'required|boolean',

                ]);

                $article = Article::find($request->id);
                $article->nom = $request->nom;
                $article->description = $request->description;
                $article->image = $request->image;
                $article->date_création = $request->input('date_création', now());
                $article->a_la_une = $request->a_la_une;
                // Update dans la base de donnée
                $article->update();
                return redirect('/articles')->with('status', 'l\'article a bien été modifier');
            }
        // supprimer un article
        public function supprimer_article ($id)
            {
                $article  = Article::find($id);
                $article->delete();
                return redirect('/articles')->with('status', 'l\'article a bien été supprimer');
            }
}
