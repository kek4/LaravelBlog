@extends('layout')

@section('css')
   @parent
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
   <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css')}}">
   <link href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet">
   <link href="{{ asset('bower_components/bootstrap-fileinput/css/fileinput.min.css')}}" media="all" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="{{asset('css/formUser.css')}}">
@endsection
@section('js')
   @parent
   <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
   <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
   <script type="text/javascript" src="{{asset('bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js')}}"></script>
<!-- canvas-to-blob.min.js is only needed if you wish to resize images before upload.
     This must be loaded before fileinput.min.js -->
<script src="{{ asset('bower_components/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js')}}" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
     This must be loaded before fileinput.min.js -->
<script src="{{ asset('bower_components/bootstrap-fileinput/js/plugins/sortable.min.js')}}" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for HTML files.
     This must be loaded before fileinput.min.js -->
<script src="{{ asset('bower_components/bootstrap-fileinput/js/plugins/purify.min.js')}}" type="text/javascript"></script>
<!-- the main fileinput plugin file -->
<script src="{{ asset('bower_components/bootstrap-fileinput/js/fileinput.min.js')}}"></script>


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
            <h3 class="box-title"><i class="fa fa-envelope" aria-hidden="true"></i> Formulaire d'inscription</h3>
         </div>
         <form role="form" method="post" action="" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-body">
               <div class="form-group @if($errors->has('nom')) has-warning @elseif(count($errors) > 0) has-success @endif">
                  <label for="nom">Nom</label>
                  <input type="text" placeholder="Entrez votre nom" id="nom" class="form-control" name="nom" value="{{ old('nom') }}">
                  @if($errors->has('nom'))
                     <span class="help-block">{{ $errors->first('nom')}}</span>
                  @endif
               </div>
               <div class="form-group @if($errors->has('prenom')) has-warning @elseif(count($errors) > 0) has-success @endif">
                  <label for="prenom">Prenom</label>
                  <input type="text" placeholder="Entrez votre prenom" id="prenom" class="form-control" name="prenom" value="{{ old('prenom') }}">
                  @if($errors->has('prenom'))
                     <span class="help-block">{{ $errors->first('prenom')}}</span>
                  @endif
               </div>
               <div class="form-group @if($errors->has('email')) has-warning @elseif(count($errors) > 0) has-success @endif">
                  <label for="email">Email</label>
                  <input type="email" placeholder="exemple@email.fr" id="email" class="form-control" name="email" value="{{ old('email') }}">
                  @if($errors->has('email'))
                     <span class="help-block">{{ $errors->first('email')}}</span>
                  @endif
               </div>
               <div class="form-group @if($errors->has('birthday')) has-warning @elseif(count($errors) > 0) has-success @endif">
                  <label>Date de naissance :</label>
                  <div class="input-group date">
                     <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                     </div>
                     <input type="text" id="birthday" name="birthday" class="form-control pull-right" value="{{ old('birthday') }}">
                  </div>
               </div>
               <div class="form-group @if($errors->has('password')) has-warning @elseif(count($errors) > 0) has-success @endif">
                  <label for="password">Mot de passe</label>
                  <input type="password" id="password" class="form-control" name="password">
                  @if($errors->has('password'))
                     <span class="help-block">{{ $errors->first('password')}}</span>
                  @endif
               </div>
               <div class="form-group @if($errors->has('password_confirmation')) has-warning @elseif(count($errors) > 0) has-success @endif">
                  <label for="password_confirmation">Confirmer le mot de passe</label>
                  <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
                  @if($errors->has('password_confirmation'))
                     <span class="help-block">{{ $errors->first('password_confirmation')}}</span>
                  @endif
               </div>
               <div class="form-group @if($errors->has('phone')) has-warning @elseif(count($errors) > 0) has-success @endif">
                  <label for="phone">Téléphone</label>
                  <input type="tel" placeholder="xx.xx.xx.xx.xx" id="phone" class="form-control" name="phone">
                  @if($errors->has('phone'))
                     <span class="help-block">{{ $errors->first('phone')}}</span>
                  @endif
               </div>
               <div class="form-group @if($errors->has('cp')) has-warning @elseif(count($errors) > 0) has-success @endif">
                  <label for="cp">Code postal</label>
                  <input type="number" placeholder="38300" id="cp" class="form-control" name="cp" value="{{ old('cp') }}">
                  @if($errors->has('cp'))
                     <span class="help-block">{{ $errors->first('cp')}}</span>
                  @endif
               </div>
               <div class="form-group @if($errors->has('ville')) has-warning @elseif(count($errors) > 0) has-success @endif">
                  <label for="ville">Ville</label>
                  <input type="text" placeholder="Entrez votre ville" id="ville" class="form-control" name="ville" value="{{ old('ville') }}">
                  @if($errors->has('ville'))
                     <span class="help-block">{{ $errors->first('ville')}}</span>
                  @endif
               </div>
               <div class="form-group @if($errors->has('url')) has-warning @elseif(count($errors) > 0) has-success @endif">
                  <label class="control-label">Choisir un avatar</label>
                  <input accept="image/*" name="url" id="url" type="file" data-url="{{ asset('/img/avatarDefault.png')}}" class="file-loading">
                  @if($errors->has('url'))
                     <span class="help-block">{{ $errors->first('url')}}</span>
                  @endif
               </div>
               <div class="form-group @if($errors->has('biographie')) has-warning @elseif(count($errors) > 0) has-success @endif">
                  <label for="biographie">Biographie</label>
                  <div class="box-body pad">
                  <textarea class="textarea" placeholder="Un peu plus sur vous..." name="biographie" id="biographie">{{ old('biographie') }}</textarea>
               </div>
                  @if($errors->has('biographie'))
                     <span class="help-block">{{ $errors->first('biographie')}}</span>
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
            <div class="box-footer">
               <button class="btn btn-primary" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Envoyer</button>
            </div>
         </form>
      </div>
   </div>
@endsection
