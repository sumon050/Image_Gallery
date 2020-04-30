@extends('welcome')
@section('content')
	<div class="row">
		<div class="col">
			<img src="{{ url($gallery->album_cover) }}" height="450px" width="600px">
		</div>
		<div class="col">
			<table class="table">
		  		<thead>
		    	 <tr>
			      <th >Name</th>
			      <th >{{ $gallery->album_title }}</th>
		         </tr>
		         <tr>
			      <th>Discreption</th>
			      <th>{{ $gallery->description }}</th>
		         </tr>
		         <tr>
			      <th>Total Image</th>
			      <th>{{count($image)}}</th>
		         </tr>
	  			</thead>
		</div>
		<div class="col">
			<a href="{{ url('images.view'.$gallery->id) }}" class="btn btn-success">View Album</a>
			<a href="{{ url('gallery.delete'.$gallery->id) }}" class="btn btn-danger">Delete Album</a>
		</div>
	</div>
@endsection