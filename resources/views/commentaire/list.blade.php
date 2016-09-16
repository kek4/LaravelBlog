@extends('layout')
@section('css')
   @parent
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
   <link rel="stylesheet" href="{{asset('bower_components/css-toggle-switch/dist/toggle-switch.css')}}">
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
               <th>Etat</th>
               <th>Auteur</th>
               <th>Article</th>
               <th>Contenu</th>
               <th>Note</th>
               <th>Date de création</th>
               <th>Supprimer</th>
            </tr>
         </thead>
         <tbody>
            @foreach($commentaires as $commentaire)
               <tr>
                  <td>
                     <fieldset>
                       <div class="switch-toggle well">
                         <input @if($commentaire->etat == 0)
                           checked
                         @endif id="trash{{ $commentaire->id }}" name="{{ $commentaire->id }}" type="radio">
                         <label for="trash{{ $commentaire->id }}" onclick="">0</label>
                         <input @if($commentaire->etat == 1)
                           checked
                         @endif id="wait{{ $commentaire->id }}" name="{{ $commentaire->id }}" type="radio">
                         <label for="wait{{ $commentaire->id }}" onclick="">1</label>
                         <input @if($commentaire->etat == 2)
                           checked
                         @endif id="online{{ $commentaire->id }}" name="{{ $commentaire->id }}" type="radio">
                         <label for="online{{ $commentaire->id }}" onclick="">2</label>
                         <a class="btn btn-primary"></a>
                       </div>
                     </fieldset>
                  </td>
                  <td>{{ $commentaire->prenom }}</td>
                  <td>{{ $commentaire->titre }}</td>
                  <td>{{ $commentaire->content }}</td>
                  <td>{{ $commentaire->note }}</td>
                  <td>{{ $commentaire->created }}</td>
                  {{-- href = route('nom de la route') , tableau associatif pour les argument et il faut definir ca ds la route--}}
                  {{-- <td><a href="{{ route('visible', ['id' => $article->id, 'visible' => $article->visibilite ]) }}">
                     @if($article->visibilite == 1)
                     <i class="fa fa-eye" aria-hidden="true"></i>
                     @else
                     <i class="fa fa-eye-slash" aria-hidden="true"></i>
                     @endif</a></td> --}}
                  <td><a href="{{ route('comdelete', ['id' => $commentaire->id]) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
@endsection
