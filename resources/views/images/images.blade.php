@extends('welcome')
@section('content')
{{-- @php
$i = count($image);
@endphp --}}
<div class="row">
		<a href="{{url('images.add'.$gallery->id)}}" class="btn btn-success">Add Image</a>
</div>
@if(count($image) == 0)
	<div class="row">
		<h1>No Image Add Yet.</h1>
	</div>
@else
	<br>
	  <div class="row">
	  	@foreach($image as $image)
	  		<div class="col-sm-3">
	  			<img src="{{ URL::to($image->image_title) }}" height="250px" width="300px">
	 			<h3 align="center">{{ $image->image_name }}</h3>
	  		</div>
		@endforeach
	  </div>
@endif
@endsection