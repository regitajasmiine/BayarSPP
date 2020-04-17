@extends('layout2.home')

@section('konten2')
<link rel="stylesheet" type="text/css" href="{{ asset('test.css') }}">
<section class="content mt-5">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Login Petugas</h3>
		</div>
		<div class="card-body">
		<form action="{{url('login/petugas')}}" method="post">
			@csrf
			<div class="form-group">
				<label for="username">username</label>
				<input type="text" id="username" name="username" class="form-control">
			</div>
			<div class="form-group">
				<label for="password">password</label>
				<input type="password" id="password" name="password" class="form-control">
			</div>
			<a href="{{url('/')}}" class="btn btn-danger mr-2">Kembali</a>
			<button type="submit" class="btn btn-primary">login</button>
		</form>
	</div>
</section>
@endsection