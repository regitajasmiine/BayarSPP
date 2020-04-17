@extends('layout.home')

@section('konten')
@section('title',$title)
<section class="content">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Input Data Petugas</h3>
		</div>
		<div class="card-body">
		<form action="{{url('admin/petugas',@$petugas->id_petugas)}}" method="post" enctype="multipart/form-data">
			@if(!empty($petugas))
				@method('PATCH')
			@endif
				
			@csrf
			
			<div class="form-group">
				<label for="nama_petugas">nama petugas</label>
				<input type="text" id="nama_petugas" name="nama_petugas" value="{{old('nama_petugas',@$petugas->nama_petugas)}}" class="form-control">
			</div>
			<div class="form-group">
				<label for="username">username</label>
				<input type="text" id="username" name="username" value="{{old('username',@$petugas->username)}}" class="form-control">
			</div>
			<div 
				@if(!empty($petugas))
					hidden
				@endif
			 class="form-group">
				<label for="password">password</label>
				<input type="password" id="password" name="password" value="{{old('password',@$petugas->password)}}" class="form-control">
			</div>
			<div class="form-group">
				<label for="level">level</label>
				<select name="level" id="level" class="form-control">
					<option value="">pilih level</option>
					<option value="admin" {{old('level',(@$petugas->level == 'admin') ? 'selected' : '')}}>admin</option>
					<option value="petugas" {{old('level',(@$petugas->level == 'petugas') ? 'selected' : '')}}>petugas</option>
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">kirim</button>
			</div>
		</form>


</div>
	</div>


</section>
@endsection