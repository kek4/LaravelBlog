@extends('layout')


@section('css')
   @parent
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection
@section('js')
   @parent
   <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
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
         <!-- /.box-header -->
         <!-- form start -->

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
               <div class="form-group @if($errors->has('email')) has-warning @elseif(count($errors) > 0) has-success @endif">
                  <label for="email">Email</label>
                  <input type="email" placeholder="exemple@email.fr" id="email" class="form-control" name="email" value="{{ old('email') }}">
                  @if($errors->has('email'))
                     <span class="help-block">{{ $errors->first('email')}}</span>
                  @endif
               </div>
               <div class="form-group @if($errors->has('site')) has-warning @elseif(count($errors) > 0) has-success @endif">
                  <label for="site">Site</label>
                  <input type="url" placeholder="hhtp://monsite.fr" id="site" class="form-control" name="site" value="{{ old('site') }}">
                  @if($errors->has('site'))
                     <span class="help-block">{{ $errors->first('site')}}</span>
                  @endif
               </div>
               <div class="form-group">
                  <labelfor="sujet">Page</label>
                  <select class="form-control" name="page" id="page">

                     @foreach($titres as $page)
                        <option value="{{ $page }}">{{ $page->titre }}</option>
                     @endforeach

                  </select>
               </div>
               <div class="form-group">
                  <label>Date de rendez-vous:</label>
                  <div class="input-group date">
                     <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                     </div>
                     <input type="text" id="datepicker" class="form-control pull-right">
                  </div>
                <!-- /.input group -->
            </div>
               <div class="form-group @if($errors->has('message')) has-warning @elseif(count($errors) > 0) has-success @endif">
                  <label for="message">Message</label>
                  <textarea placeholder="Entrez votre message" rows="3" class="form-control" name="message" id="message">{{ old('message') }}</textarea>
                  @if($errors->has('message'))
                     <span class="help-block">{{ $errors->first('message')}}</span>
                  @endif
               </div>
               <div class="checkbox @if($errors->has('cgu')) has-warning @elseif(count($errors) > 0) has-success @endif">
                  <label>
                     <input type="checkbox" name="cgu"> J'accepte les C.G.U.
                     @if($errors->has('cgu'))
                        <span class="help-block">{{ $errors->first('cgu')}}</span>
                     @endif
                  </label>
               </div>

            </div>
            <!-- /.box-body -->


            <div class="box-footer">
               <button class="btn btn-primary" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Envoyer</button>
            </div>
         </form>
      </div>
   </div>
@endsection
