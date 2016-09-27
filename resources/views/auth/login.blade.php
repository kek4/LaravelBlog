@extends('layout_logout')

@section('content')
   <div class="login-box">
      <div class="login-logo">
         <a href="../../index2.html"><b>Admin</b>LTE</a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
         <p class="login-box-msg">Sign in to start your session</p>
         <form role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">

               <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
               <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
               @if ($errors->has('email'))
                  <span class="help-block">
                     <strong>{{ $errors->first('email') }}</strong>
                  </span>
               @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">

               <input id="password" type="password" placeholder="Password" class="form-control" name="password">
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
               @if ($errors->has('password'))
                  <span class="help-block">
                     <strong>{{ $errors->first('password') }}</strong>
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
                     <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
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
                  <!-- /.social-auth-links -->

                  <a href="{{ url('/password/reset') }}">J'ai oublié mon mot de passe :'(</a><br>
                  <a href="{{ url('/register')}}" class="text-center">S'enregister</a>
               </div>
            </div>
         </div>
@endsection
