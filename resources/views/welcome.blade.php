@extends('layout')
@section('css')
   @parent
   <link rel="stylesheet" href="{{asset ('plugins/morris/morris.css')}}">
@endsection
@section('js')
   @parent
   <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
   <script src="{{asset ('plugins/chartjs/Chart.js')}}"></script>
   <script src="{{asset ('plugins/morris/morris.min.js')}}"></script>
   <script src="{{asset ('js/welcome.js')}}"></script>
@endsection
@section('content')
   <div class="container-fluid">
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

      <div class="row">
         <div class="col-xs-6">
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
         <div class="col-xs-6">
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
                  <div class="chart" id="sales-chart">
                  </div>
               </div>
               <!-- /.box-body -->
            </div>


         </div>
      </div>
      <div class="row">
         <div class="col-xs-6">
         <div class="box box-success">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
               <i class="fa fa-comments-o"></i>

               <h3 class="box-title">Chat</h3>

               <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                  <div class="btn-group" data-toggle="btn-toggle">
                     <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
                     </button>
                     <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                  </div>
               </div>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;"><div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; height: 250px;">
               <!-- chat item -->
               <div class="item">
                  <img src="dist/img/user4-128x128.jpg" alt="user image" class="online">

                  <p class="message">
                     <a href="#" class="name">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                        Mike Doe
                     </a>
                     I would like to meet you to discuss the latest news about
                     the arrival of the new theme. They say it is going to be one the
                     best themes on the market
                  </p>
                  <div class="attachment">
                     <h4>Attachments:</h4>

                     <p class="filename">
                        Theme-thumbnail-image.jpg
                     </p>

                     <div class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm btn-flat">Open</button>
                     </div>
                  </div>
                  <!-- /.attachment -->
               </div>
               <!-- /.item -->
               <!-- chat item -->
               <div class="item">
                  <img src="dist/img/user3-128x128.jpg" alt="user image" class="offline">

                  <p class="message">
                     <a href="#" class="name">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                        Alexander Pierce
                     </a>
                     I would like to meet you to discuss the latest news about
                     the arrival of the new theme. They say it is going to be one the
                     best themes on the market
                  </p>
               </div>
               <!-- /.item -->
               <!-- chat item -->
               <div class="item">
                  <img src="dist/img/user2-160x160.jpg" alt="user image" class="offline">

                  <p class="message">
                     <a href="#" class="name">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                        Susan Doe
                     </a>
                     I would like to meet you to discuss the latest news about
                     the arrival of the new theme. They say it is going to be one the
                     best themes on the market
                  </p>
               </div>
               <!-- /.item -->
            </div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 184.911px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
            <!-- /.chat -->
            <div class="box-footer">
               <div class="input-group">
                  <input class="form-control" placeholder="Type message...">

                  <div class="input-group-btn">
                     <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
                  </div>
               </div>
            </div>
         </div>
         </div>
         <div class="col-xs-6">
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
                  <div id="myfirstchart" style="height: 250px;">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

@endsection
