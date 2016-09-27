@extends('layout')
@section('css')
   @parent
   <link rel="stylesheet" href="{{asset ('plugins/morris/morris.css')}}">
   <link rel="stylesheet" href="{{asset ('bower_components/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
   <link rel="stylesheet" href="{{asset ('css/welcome.css')}}">
@endsection
@section('js')
   @parent
   <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
   <script src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
   <script src="{{asset ('plugins/chartjs/Chart.js')}}"></script>
   <script src="{{asset ('bower_components/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
   <script src="{{asset ('plugins/morris/morris.min.js')}}"></script>
   <script src="{{asset ('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
   <script src="{{asset ('js/welcome.js')}}"></script>
   <script type="text/javascript">
   $(function(){

   })
   </script>
   <script src="{{asset ('js/TchatController.js')}}"></script>
   <script src="{{asset ('js/CommentaireController.js')}}"></script>
   <script src="{{asset ('js/VideosController.js')}}"></script>
@endsection
@section('content')
   <div class="container-fluid">
      {{-- row stat --}}
      <div class="row">
         {{-- Article en ligne --}}
         <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
               <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

               <div class="info-box-content">
                  <span class="info-box-text">Articles en ligne</span>
                  <span class="info-box-number">{{ $nbArticles }}</span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- Catégorie -->
         <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
               <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

               <div class="info-box-content">
                  <span class="info-box-text">Catégories</span>
                  <span class="info-box-number">{{ $nbCatWithArt }}</span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
               <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

               <div class="info-box-content">
                  <span class="info-box-text">Médias</span>
                  <span class="info-box-number">{{ $nbMedia }}</span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
               <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

               <div class="info-box-content">
                  <span class="info-box-text">Commentaires actif</span>
                  <span class="info-box-number">{{ $nbComActif }}</span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->
      </div>
      {{-- row graph --}}
      <div class="row">
         <div class="col-xs-4">
            <div class="box box-danger">
               <div class="box-header with-border">
                  <h3 class="box-title">Répartition des articles par catégories</h3>

                  <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                     </button>
                     <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
               </div>
               <div class="box-body">
                  <canvas id="pieChart" style="height: 234px; width: 468px;" height="234" width="468"></canvas>
               </div>
               <!-- /.box-body -->
            </div>
         </div>
         <div class="col-xs-4">
            <div class="box box-danger">
               <div class="box-header with-border">
                  <h3 class="box-title">Articles par commentaires</h3>

                  <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                     </button>
                     <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
               </div>
               <div class="box-body chart-responsive">
                  <div class="chart" id="sales-chart" data-url="{{ route('statsArticles') }}">
                  </div>
               </div>
               <!-- /.box-body -->
            </div>
         </div>
         <div class="col-xs-4">
            <div class="box box-success">
               <div class="box-header with-border">
                  <h3 class="box-title">Commentaires par années</h3>

                  <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                     </button>
                     <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
               </div>
               <div class="box-body chart-responsive">
                  <div id="myfirstchart" data-url="{{ route('comsArticles') }}">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-6" ng-controller="TchatController" data-url="{{ route('tchat') }}">
            <div class="box box-success">
               <div class="box-header ui-sortable-handle" style="cursor: move;">
                  <i class="fa fa-comments-o"></i>

                  <h3 class="box-title">#{ titre }#</h3>

                  <div class="pull-right">
                     <p></p>
                  </div>
               </div>
               <!-- chat item -->
               <div class="slimtchat">
                  <div class="item" ng-repeat="message in messages">
                     <div class="row">
                        <div class="col-xs-7">
                           <p class="message contenttchat">
                              #{message.content}#
                           </p>
                        </div>
                        <div class="col-xs-4 col-xs-offset-1">
                           <p class="message pull-right datebeforescroll">
                              #{message.created_at|ago}#
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="box-footer">
                  <div class="item">
                     <form ng-submit="add()">
                        {{ csrf_field() }}
                        <input ng-model="content" class="form-control" />
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-6" id="ArticleRandom" ng-controller="CommentaireController" data-id="{{ $randomArt->id }}">
            <div class="box box-widget">
               <div class="box-header with-border">
                  <div class="user-block">
                     <span class="username"><a href="#">{{ $randomArt->titre }}</a></span>
                     <span class="username">{{ $catArt->cat_titre }}</span>
                     <span class="description">publié le {{ Carbon\Carbon::createFromFormat('Y-m-d h:i:s', $randomArt->created_at)->format('d/m/Y \\à h:i') }}</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="box-tools">
                     <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
                     <i class="fa fa-circle-o"></i></button>
                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                     </button>
                     <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                     <!-- /.box-tools -->
               </div>
                  <!-- /.box-header -->
               <div class="box-body">
                  <img class="img-responsive pad" src="../dist/img/photo2.png" alt="Photo">

                  <p>{{ $randomArt->description }}</p>
                  <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                  <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                  <span class="pull-right text-muted"> {{ $numberComArt }}@if( $numberComArt > 1) commentaires
                                                                     @else commentaire
                                                                     @endif
                  </span>
               </div>
               <!-- /.box-body -->
               <div class="box-footer box-comments">
                  <div ng-class="take < 3 ? 'slimcomless2' : 'slimcommore2'">
                     <div class="box-comment" ng-repeat="commentaire in commentaires">
                        <!-- User image -->
                        {{-- <img class="img-circle img-sm" src="" alt="User Image"> --}}

                        <div class="comment-text">
                           <span class="username">
                              #{ commentaire.prenom }# #{ commentaire.nom }#
                              {{-- <select class="example">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                              </select> --}}
                              #{ commentaire.note }#
                              <span class="text-muted pull-right datebeforescroll">
                                 <i class="fa fa-clock-o" aria-hidden="true"></i>
                                 #{ commentaire.created_at|ago }#</span>
                           </span><!-- /.username -->
                           <p>#{ commentaire.content }#
                           </p>

                        </div>
                        <!-- /.comment-text -->
                     </div>
                  </div>
                  <!-- /.box-comment -->
               </div>
               <p class="moreComment" ng-if="{{ $numberComArt }} > take "><a ng-click="more()" href="">Voir plus de commentaires</a></p>
               <!-- /.box-footer -->
               <div class="box-footer">
                  <form ng-submit="addCom()">
                     {{ csrf_field() }}
                     <input ng-model="content" class="form-control" />
                     <select id="exemple" ng-model="note">
                       <option value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                       <option value="5">5</option>
                     </select>

                  </form>
               </div>
                  <!-- /.box-footer -->
            </div>
         </div>
      </div>
      <div class="box row">
         <div class="box-header">
            <h3><i class="fa fa-video-camera"></i> Créer une vidéo</h3>
         </div>
      </div>
      {{-- <div class="row">
         <div class="col-xs-12"  ng-controller="VideosController">
            <div class="box-body">
               <form>
                  <input class="form-control" type="text" ng-model="titre" required placeholder="Titre">
                  <textarea class="form-control"  ng-model="description" required placeholder="Description.."></textarea>
                  <input class="form-control" type="url" ng-model="url" required placeholder="Url: youtube, dailymotion">
                  <input class="form-control" type="text" ng-model="annee" required placeholder="Année de sortie">
                  <input class="form-control" type="text" ng-model="created_at" required placeholder="date">
                  <button ng-click="add()" type="submit" class="btn btn-primary" name="button"><i class="fa fa-check"></i>Ajouter la vidéo</button>
               </form>
            </div>
            <ul class="timeline" ng-repeat="data in datas">
               <li>
                  <div class="timeline-item">
                     <span class="time"><i class="fa fa-clock-o"></i> #{ data.created_at|ago }#</span>

                     <h3 class="timeline-header">#{ data.titre }#</h3>

                     <div class="timeline-body">
                        <div class="embed-responsive embed-responsive-16by9">
                           <iframe class="embed-responsive-item" ng-src="#{trustSrc(data.url)}#" frameborder="0" allowfullscreen="" ></iframe>
                        </div>
                     </div>
                     <div class="timeline-footer">
                        <p class="pull-right"><i ng-click="remove(data)" class="fa fa-times"></i></p>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
      </div> --}}

   </div>


@endsection
