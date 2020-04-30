@extends('welcome')
@section('content')
  <div class="row">
  	@foreach($gallery as $gallery)
  		<div class="col-sm-3">
  			<a href="{{ url('gallery.view'.$gallery->id) }}">
  			<img src="{{ URL::to($gallery->album_cover) }}" height="250px" width="300px">
  			<br>
  			<h3 align="center">{{ $gallery->album_title }}</h3>
  			</a>
  		</div>
	@endforeach
  </div>
@endsection