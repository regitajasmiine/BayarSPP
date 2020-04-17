@extends('layout.home')

@section('konten')
@section('title',$title)
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('logout')}}">logout</a></li>
          <li class="breadcrumb-item active">{{Session::get('nama_petugas')}}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
  <!-- container-fluid -->
  <div class="container-fluid">

    <!-- START STAT BOX -->
    <div class="row">
    	<div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-blue">
          <div class="inner">
            <h2>Manage Data</h2>
            <p class="text-warning">Siswa</p>
          </div>
          <div class="icon">
          	<i class=""></i>
          </div>
          <a href="{{url('admin/crud/siswa')}}" class="small-box-footer">Klik disini</a>
        </div>
      </div>
    	<div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-blue">
          <div class="inner">
          	<h2>Manage Data</h2>
            <p class="text-warning">Petugas</p>
          </div>
          <div class="icon">
          	<i class=""></i>
          </div>
          <a href="{{url('admin/crud/petugas')}}" class="small-box-footer">Klik disini<i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    	<div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-blue">
          <div class="inner">
          	<h2>Manage Data</h2>
            <p class="text-warning">Kelas</p>
          </div>
          <div class="icon">
          	<i class=""></i>
          </div>
          <a href="{{url('admin/crud/kelas')}}" class="small-box-footer">Klik disini<i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    	<div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-blue">
          <div class="inner">
          	<h2>Manage Data</h2>
            <p class="text-warning">SPP</p>
          </div>
          <div class="icon">
          	<i class=""></i>
          </div>
          <a href="{{url('admin/crud/spp')}}" class="small-box-footer">Klik disini<i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    	<div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-blue">
          <div class="inner">
          	<h2>Manage Data</h2>
            <p class="text-warning">Pembayaran</p>
          </div>
          <div class="icon">
          	<i class=""></i>
          </div>
          <a href="{{url('admin/crud/pembayaran')}}" class="small-box-footer">Klik disini<i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
		</div>
	</div>

	</div>
</section>
@endsection