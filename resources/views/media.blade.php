@extends('layout')

@section('css')
   @parent
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
   <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css')}}">
@endsection
@section('js')
   @parent
   <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
   @if(Session::has('success'))
      <script>toastr.success("{{ Session::get('success') }}", "Bravo !")</script>
   @endif
@endsection


@section('content')
   <div class="col-xs-6">
      @if(count($errors) > 0)
         <div class="alert alert-danger">
            <ul>
               @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
      <div class="box box-info">
         <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-film" aria-hidden="true"></i> Ajout de média</h3>
         </div>
         <form role="form" method="post" action="">
            {{ csrf_field() }}
            <div class="box-body">
               <div class="form-group @if($errors->has('titre')) has-warning @elseif(count($errors) > 0) has-success @endif">
                  <label for="titre">Titre</label>
                  <input type="text" placeholder="Entrez un titre" id="titre" class="form-control" name="titre" value="{{ old('titre') }}">
                  @if($errors->has('titre'))
                     <span class="help-block">{{ $errors->first('titre')}}</span>
                  @endif
               </div>
               <div class="form-group @if($errors->has('page')) has-warning @elseif(count($errors) > 0) has-success @endif">
                  <label for="sujet">Page</label>
                  <select class="form-control" name="page" id="page">

                     @foreach($titres as $page)
                        <option value="{{ $page->id }}" @if (old('page') == $page->id) selected @endif>{{ $page->titre }}</option>
                     @endforeach

                  </select>
               </div>
               <div class="form-group @if($errors->has('url')) has-warning @elseif(count($errors) > 0) has-success @endif">
                  <label for="site">Url video</label>
                  <input type="url" placeholder="http://monsite.fr" id="site" class="form-control" name="url" value="{{ old('url') }}">
                  @if($errors->has('url'))
                     <span class="help-block">{{ $errors->first('url')}}</span>
                  @endif
               </div>
               <div class="checkbox @if($errors->has('visibilite')) has-warning @elseif(count($errors) > 0) has-success @endif">
                  <label>
                     <input type="checkbox" value="1" name="visibilite"> Rendre visible
                     @if($errors->has('visibilite'))
                        <span class="help-block">{{ $errors->first('visibilite')}}</span>
                     @endif
                  </label>
               </div>
               <div class="form-group">
                  <label>Date d'activation :</label>
                  <div class="input-group date">
                     <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                     </div>
                     <input type="text" id="datepicker" name="date" class="form-control pull-right" value="{{ old('date') }}">
                  </div>

               </div>

            </div>


            <div class="box-footer">
               <button class="btn btn-primary" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Envoyer</button>
            </div>
         </form>
      </div>
   </div>
@endsection
