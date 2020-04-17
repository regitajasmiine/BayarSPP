@extends('layout.home')

@section('konten')
@section('title',$title)
<section class="content">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Input Data SPP</h3>
		</div>
		<div class="card-body">
		<form action="{{url('admin/spp',@$spp->id_spp)}}" method="post">
			@if(!empty($spp))
				@method('PATCH')
			@endif
				
			@csrf

			<div class="form-group">
				<label for="tahun">tahun</label>
				<input type="text" id="tahun" name="tahun" value="{{old('tahun',@$spp->tahun)}}" class="form-control">
			</div>
			<div class="form-group">
				<label for="nominal">nominal</label>
				<input type="text" id="nominal" name="nominal" value="{{old('nominal',@$spp->nominal)}}" class="form-control">
			</div>
			<div>
				<button type="submit" class="btn btn-primary">kirim</button>
			</div>
		</form>



	</div>


</section>
@endsection