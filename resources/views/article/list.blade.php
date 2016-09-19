@extends('layout')
@section('css')
   @parent
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
   <link rel="stylesheet" href="{{asset('css/formList.css')}}">
@endsection
@section('js')
   @parent
   <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   @if(Session::has('success'))
      <script>toastr.success("{{ Session::get('success') }}")</script>
   @endif
@endsection
@section('content')
   <div class="col-xs-12">
      <table class='table table-hover'>
         <thead>
            <tr class="success">
               <th>Titre</th>
               <th>Résumé</th>
               <th>Description</th>
               <th>Image</th>
               <th>Note</th>
               <th>Date publication</th>
               <th>Visibilité</th>
               <th>Supprimer</th>
            </tr>
         </thead>
         <tbody>
            @foreach($articles as $article)
               <tr>
                  <td><a href="{{ route('artvoir', ['page' => App\Article::position($article->id), 'id' => $article->id]) }}">{{ $article->titre }}</a></td>
                  <td>{{ $article->resume }}</td>
                  <td>{{ mb_strimwidth($article->description, 0 , 200, "...") }}</td>
                  <td><img src="{{$article->image}}" alt="" class="img-rounded"></td>
                  <td><span class="badge">{{ $article->note }}</span></td>
                  <td>{{ $article->date_publication }}</td>
                  {{-- href = route('nom de la route') , tableau associatif pour les argument et il faut definir ca ds la route--}}
                  <td><a href="{{ route('artvisible', ['id' => $article->id, 'visible' => $article->visibilite ]) }}">
                     @if($article->visibilite == 1)
                     <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
                     @else
                     <i class="fa fa-eye-slash fa-2x" aria-hidden="true"></i>
                     @endif</a></td>
                     <td><a href="{{ route('artdelete', ['id' => $article->id]) }}"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
@endsection
