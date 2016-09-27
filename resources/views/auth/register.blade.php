@extends('layout_logout')
@section('css')
   @parent
   <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css')}}">
   <link href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet">
   <link href="{{ asset('bower_components/bootstrap-fileinput/css/fileinput.min.css')}}" media="all" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="{{asset('css/formUser.css')}}">
@endsection
@section('js')
   @parent
   <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
   <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
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
<script src="{{ asset('js/form.js')}}"></script>
@endsection

@section('content')

<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

   <div class="register-box-body">
      <p class="login-box-msg">S'enregistrer</p>
      <form role="form" method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
         <div class="form-group has-feedback{{ $errors->has('nom') ? ' has-error' : '' }}">
            <input id="nom" type="text" placeholder="Nom" class="form-control" name="nom" value="{{ old('nom') }}">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            @if ($errors->has('nom'))
               <span class="help-block">
                   <strong>{{ $errors->first('nom') }}</strong>
               </span>
            @endif
         </div>
         <div class="form-group has-feedback{{ $errors->has('prenom') ? ' has-error' : '' }}">
            <input id="prenom" type="text" placeholder="Prenom" class="form-control" name="prenom" value="{{ old('prenom') }}">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            @if ($errors->has('prenom'))
               <span class="help-block">
                   <strong>{{ $errors->first('prenom') }}</strong>
               </span>
            @endif
         </div>
         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if ($errors->has('email'))
               <span class="help-block">
                   <strong>{{ $errors->first('email') }}</strong>
               </span>
            @endif
         </div>
         <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" placeholder="Mot de passe" class="form-control" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
               <span class="help-block">
                   <strong>{{ $errors->first('password') }}</strong>
               </span>
            @endif
         </div>
         <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <input id="password-confirm" type="password" placeholder="Confirmer le mot de passe" class="form-control" name="password_confirmation">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            @if ($errors->has('password_confirmation'))
               <span class="help-block">
                   <strong>{{ $errors->first('password_confirmation') }}</strong>
               </span>
            @endif
         </div>
         <div class="form-group has-feedback{{ $errors->has('birthday') ? ' has-error' : '' }}">
            <input id="birthday" type="text" placeholder="Date de naissance" class="form-control" name="birthday" value="{{ old('birthday') }}">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            @if ($errors->has('birthday'))
               <span class="help-block">
                   <strong>{{ $errors->first('birthday') }}</strong>
               </span>
            @endif
         </div>
         <div class="form-group has-feedback{{ $errors->has('phone') ? ' has-error' : '' }}">
            <input id="phone" type="tel" placeholder="Téléphone: xx.xx.xx.xx.xx" class="form-control" name="phone" value="{{ old('phone') }}">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            @if ($errors->has('phone'))
               <span class="help-block">
                   <strong>{{ $errors->first('phone') }}</strong>
               </span>
            @endif
         </div>
         <div class="form-group has-feedback{{ $errors->has('cp') ? ' has-error' : '' }}">
            <input id="cp" type="number" placeholder="Code postal" class="form-control" name="cp" value="{{ old('cp') }}">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            @if ($errors->has('cp'))
               <span class="help-block">
                   <strong>{{ $errors->first('cp') }}</strong>
               </span>
            @endif
         </div>
         <div class="form-group has-feedback{{ $errors->has('ville') ? ' has-error' : '' }}">
            <input id="ville" type="text" placeholder="Ville" class="form-control" name="ville" value="{{ old('ville') }}">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            @if ($errors->has('ville'))
               <span class="help-block">
                   <strong>{{ $errors->first('ville') }}</strong>
               </span>
            @endif
         </div>
         <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
            <input accept="image/*" id="url" type="file" placeholder="Url de l'avatar" data-url="{{ asset('/img/avatarDefault.png')}}" class="form-control" name="url">
            @if ($errors->has('url'))
               <span class="help-block">
                   <strong>{{ $errors->first('url') }}</strong>
               </span>
            @endif
         </div>
         <div class="form-group{{ $errors->has('biographie') ? ' has-error' : '' }}">
            <textarea class="textarea form-control" id="biographie" type="text" placeholder="Biographie"  name="biographie">{{ old('biographie') }}</textarea>
            @if ($errors->has('biographie'))
               <span class="help-block">
                   <strong>{{ $errors->first('biographie') }}</strong>
               </span>
            @endif
         </div>

         <div class="row">
            <div class="col-xs-8">
               <div class="checkbox icheck">
                  <label>
                  <div class="icheckbox_square-blue">
                     <input type="checkbox"  name="remember"></div> Remember Me
                  </label>
               </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
               <button type="submit" class="btn btn-primary btn-block btn-flat">S'enregistrer</button>
            </div>
            <!-- /.col -->
         </div>
      </form>
      <div class="social-auth-links text-center">
         <p>- OR -</p>
         <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
           Facebook</a>
           <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
              Google+</a>
      </div>
   </div>
</div>

@endsection
