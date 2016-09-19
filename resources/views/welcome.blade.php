@extends('layout')
@section('js')
   @parent
   <script src="{{asset ('plugins/chartjs/Chart.min.js')}}"></script>
   <script src="{{asset ('js/welcome.js')}}"></script>
@endsection
@section('content')
   <div class="row">
           <div class="col-md-3 col-sm-6 col-xs-12">
             <div class="info-box">
               <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

               <div class="info-box-content">
                 <span class="info-box-text">Articles en ligne</span>
                 <span class="info-box-number">1</span>
               </div>
               <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
           </div>
           <!-- /.col -->
           <div class="col-md-3 col-sm-6 col-xs-12">
             <div class="info-box">
               <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

               <div class="info-box-content">
                 <span class="info-box-text">Catégories</span>
                 <span class="info-box-number">5</span>
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
                 <span class="info-box-number">13</span>
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
                 <span class="info-box-number">93</span>
               </div>
               <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
           </div>
           <!-- /.col -->
        </div>


        <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Donut Chart</h3>

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

@endsection
