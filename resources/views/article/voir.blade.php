@extends('layout')
@section('css')
   @parent
   <link rel="stylesheet" href="{{asset('css/voirArticle.css')}}">
@endsection
@section('js')
   @parent
@endsection
@section('content')

<div class="col-xs-9 col-xs-offset-1">
	<table class="table table-bordered table-hover">
      @foreach ($articles as $article)
   	<tr>
   		<td>Titre</td>
   		<td>{{ $article->titre }}</td>
   	</tr>
   	<tr>
   		<td>Créer par</td>
   		<td>{{ App\Article::articleAutCat($article->id)->prenom }}</td>
   	</tr>
   	<tr>
   		<td>Catégorie</td>
   		<td>{{ App\Article::articleAutCat($article->id)->cat_titre }}</td>
   	</tr>
   	<tr>
   		<td>Résumé</td>
   		<td>{{ $article->resume }}</td>
   	</tr>
   	<tr>
   		<td>Description</td>
   		<td>{{ $article->description }}</td>
   	</tr>
   	<tr>
   		<td>Image</td>
   		<td><img src="{{ $article->image }}" alt="" /></td>
   	</tr>
   	<tr>
   		<td>Note</td>
   		<td>{{ $article->note }}</td>
   	</tr>
   	<tr>
   		<td>Année publication</td>
   		<td>{{ $article->date_publication }}</td>
   	</tr>
   	<tr>
   		<td>Date de création</td>
   		<td>{{ $article->created_at }}</td>
   	</tr>
   	<tr>
   		<td>Date de modification</td>
   		<td>{{ $article->updated_at }}</td>
   	</tr>
   	<tr>
   		<td>PDF</td>
   		<td>
            <a href="{{ route('artpdf', ['id' => $article->id]) }}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
         </td>
   	</tr>
   	<tr>
   		<td>Like</td>
   		<td>
            <a href="{{ route('artlike', ['id' => $article->id]) }}">
               @if(Session::has('like') && in_array($article->id, Session::get('like')))
                  <i class="fa fa-heart" aria-hidden="true"></i>
               @else
                  <i class="fa fa-heart-o" aria-hidden="true"></i>
               @endif</a>
         </td>
   	</tr>
      @endforeach
	</table>
   {{-- On appel la class pour paginer avecla methode overRender et la page en argument --}}
	{!! with(new App\Pagination\HDPresenter($articles))->overRender($page); !!}
</div>

@endsection
