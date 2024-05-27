<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <center>
    <h1>Articles</h1>
    <a href="/ajouter" class="btn btn-primary" style="text-decoration: none;">ajouter un article</a>
    @if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
    </center>
    @foreach ($articles as $article)
    <div class="container" style="display: flex; flex-direction:row; justify-content:space-between;">
    <div class="card" style="width: 28rem; margin:auto;">
        <img src={{$article->image}} class="card-img-top" alt="mage-article">
        <div class="card-body">
          <h5 class="card-title">{{$article->nom}}</h5>
          <p class="card-text"><a href="#" style="text-decoration: none; color:#000000;">{{$article->description}}</a></p>
            <br>
            <span>{{$article->date_création}}</span>
        </div>
        <a href="/mise_à_jour-articles/{{$article->id}}" class="btn btn-primary">Modifier</a>
        <a href="/supprimer-articles/{{$article->id}}" class="btn btn-danger">Supprimer</a>
      </div>
      {{-- carde2 --}}
    </div>
    @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
