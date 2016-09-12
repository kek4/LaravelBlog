@extends('layout')

@section('css')
   @parent
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
   <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
@endsection
@section('js')
   @parent
   <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   <script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
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
            <h3 class="box-title"><i class="fa fa-envelope" aria-hidden="true"></i> Formulaire de contact</h3>
         </div>
         <!-- /.box-header -->
         <!-- form start -->

         <form role="form" method="post" action="">
            {{ csrf_field() }}
            <div class="box-body">
               <label for="genre">Sexe</label>
               <div class="form-group @if($errors->has('genre')) has-warning @elseif(count($errors) > 0) has-success @endif">
                  <div class="radio-inline">
                      <input @if (old('genre') == "homme") checked @endif type="radio" value="homme" id="homme" name="genre">
                      Homme
                  </div>
                  <div class="radio-inline">
                      <input @if (old('genre') == "femme") checked @endif type="radio" value="femme" id="femme" name="genre">
                      Femme
                  </div>
                  @if($errors->has('genre'))
                     <span class="help-block">{{ $errors->first('genre')}}</span>
                  @endif
                </div>
               <div class="form-group @if($errors->has('nom')) has-warning @elseif(count($errors) > 0) has-success @endif">
                  <label for="nom">Nom</label>
                  <input type="text" placeholder="Entrez votre nom" id="nom" class="form-control" name="nom" value="{{ old('nom') }}">
                  @if($errors->has('nom'))
                     <span class="help-block">{{ $errors->first('nom')}}</span>
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
                  <input type="url" placeholder="http://monsite.fr" id="site" class="form-control" name="site" value="{{ old('site') }}">
                  @if($errors->has('site'))
                     <span class="help-block">{{ $errors->first('site')}}</span>
                  @endif
               </div>
               <div class="form-group @if($errors->has('sujet')) has-warning @elseif(count($errors) > 0)  has-success @endif">
                  <labelfor="sujet">Sujet</label>
                  <select class="form-control" name="sujet" id="sujet">
                     <option value="contact" @if (old('sujet') == "contact") selected="selected" @endif>Prise de contact</option>
                     <option value="article" @if (old('sujet') == "article") selected="selected" @endif>Article</option>
                     <option value="acheter" @if (old('sujet') == "acheter") selected="selected" @endif>Acheter une alimentation</option>
                     <option value="manger" @if (old('sujet') == "manger") selected="selected" @endif>Manger des cookies</option>
                     <option value="dormir" @if (old('sujet') == "dormir") selected="selected" @endif>Dormir</option>
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
