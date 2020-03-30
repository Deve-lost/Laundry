@extends('layouts.master')

@section('title', 'Dashboard')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/pages/project.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/toastr.css')}}">
@stop

@section('content')
<section class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-head">
            <div class="card-header">
               <h4 class="card-title">Laporan Keuangan Bulan - {{ $bulan }}</h4>
               <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
               <div class="heading-elements">
                  <span class="badge badge-info">{{ $tanggal }}</span>
               </div>
            </div>
            <div class="px-1">
               <ul class="list-inline list-inline-pipe text-center p-1 border-bottom-grey border-bottom-lighten-3">
                  <li>Project Owner: <span class="text-muted">Margaret Govan</span></li>
                  <li>Start: <span class="text-muted">01/Feb/2016</span></li>
                  <li>Due on: <span class="text-muted">01/Oct/2016</span></li>
                  <li><a href="#" class="text-muted" data-toggle="tooltip" data-placement="bottom" title="Export as PDF"><i class="fa fa-file-pdf-o"></i></a></li>
               </ul>
            </div>
         </div>
         <!-- project-info -->
         <div id="project-info" class="card-body row">
            <div class="project-info-count col-lg-4 col-md-12">
               <!-- Coming Soon! >_! -->
            </div>
            <div class="project-info-count col-lg-4 col-md-12">
               <div class="project-info-icon">
                  <h2>160</h2>
                  <div class="project-info-sub-icon">
                     <span class="fa fa-calendar-check-o"></span>
                  </div>
               </div>
               <div class="project-info-text pt-1">
                  <h5>Laporan Bulan Ini</h5>
               </div>
            </div>
            <div class="project-info-count col-lg-4 col-md-12">
               <!-- Coming Soon! >_! -->
            </div>
         </div>
         <!-- project-info -->
         <div class="card-body">
            <div class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
               <span>-- Pilih Outlet --</span>
            </div>
            <div class="row py-2">
               <div class="col-lg-6 col-md-12">
                  <div class="insights px-2">
                     <div><span class="text-info h3">82%</span> <span class="float-right">Tasks</span></div>
                     <div class="progress progress-md mt-1 mb-0">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 82%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 col-md-12">
                  <div class="insights px-2">
                     <div><span class="text-success h3">78%</span> <span class="float-right">TaskLists</span></div>
                     <div class="progress progress-md mt-1 mb-0">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 78%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row py-2">
               <div class="col-lg-6 col-md-12">
                  <div class="insights px-2">
                     <div><span class="text-warning h3">68%</span> <span class="float-right">Milestones</span></div>
                     <div class="progress progress-md mt-1 mb-0">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 68%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 col-md-12">
                  <div class="insights px-2">
                     <div><span class="text-danger h3">62%</span> <span class="float-right">Bugs</span></div>
                     <div class="progress progress-md mt-1 mb-0">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 62%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@stop

@section('footer')
    <script src="{{asset('admin/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/pages/project-summary.min.js')}}"></script>
	
	@if(Session::has('selamatdatang'))
	<script>
	    toastr.info('{{ auth()->user()->nama }}','Selamat Datang Kembali!');
	</script>
	@endif

	@if(Session::has('suksespw'))
	<script>
	    toastr.success('Password Berhasil Diperbharui','Sukses');
	</script>
	@endif
@stop
