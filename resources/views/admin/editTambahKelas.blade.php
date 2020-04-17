@extends('layout.home')

@section('konten')
@section('title',$title)
<section class="content">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Input Data Kelas</h3>
		</div>
		<div class="card-body">

		<form action="{{url('admin/kelas',@$kelas->id_kelas)}}" method="post" enctype="multipart/form-data">
			@if(!empty($kelas))
				@method('PATCH')
			@endif
				
			@csrf

			<div class="form-group">
				<b>Nama Kelas</b><b style="color: #808080"> (XII RPL 1)</b>
			<!--	<label for="nama_kelas">nama kelas</label> -->
				<input class="form-control" type="text" id="nama_kelas" name="nama_kelas" value="{{old('nama_kelas',@$kelas->nama_kelas)}}">
			</div>
			<div class="form-group">
				<b>Kompetensi Keahlian</b><b style="color: #808080"> (Rekayasa Perangkat Lunak)</b>
				<input class="form-control" type="text" id="kompetensi_keahlian" name="kompetensi_keahlian" value="{{old('kompetensi_keahlian',@$kelas->kompetensi_keahlian)}}">
			</div>
				<button type="submit" class="btn btn-primary">kirim</button>
		</form>

	</div>

	</div>


</section>
@endsection