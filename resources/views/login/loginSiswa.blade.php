@extends('layout2.home')

@section('konten2')
<section class="content mt-5">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Login Siswa</h3>
		</div>
		<div class="card-body">
		<form action="{{url('login/siswa')}}" method="post">
			@csrf
			<div class="form-group">
				<label for="nisn">nisn</label>
				<input type="text" id="nisn" name="nisn" class="form-control">
			</div>
			<a href="{{url('/')}}" class="btn btn-danger mr-2">Kembali</a>
			<button type="submit" class="btn btn-primary">login</button>
		</form>
	</div>
</section>
@endsection