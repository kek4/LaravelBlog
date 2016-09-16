@extends('layout')
@section('css')
   @parent
   <link rel="stylesheet" href="{{asset('css/formList.css')}}">
@endsection
@section('content')
   <div class="col-xs-6">
      <table class='table table-hover'>
         <thead>
            <tr class="success">
               <th>Avatar</th>
               <th>Nom</th>
               <th>Prénom</th>
               <th>Email</th>
            </tr>
         </thead>
         <tbody>
            @foreach($users as $user)
               <tr>
                  <td><img src="{{asset('uploads/'.$user->avatar)}}" alt="" class="img-circle"></td>
                  <td>{{ $user->nom }}</td>
                  <td>{{ $user->prenom }}</td>
                  <td>{{ $user->email }}</td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
@endsection
