@extends('welcome')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="col-md-8">
{{Form::open(['url' => 'gallery.create','method'=>'post','enctype'=>'multipart/form-data','files' => true])}}

<div class="form-group">
    {{Form::label('Album Name') }}
    {{Form::text('album_title', '', ['class'=>'form-control','placeholder'=>'Enter Album Name'])}}
</div>

<div class="control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        {{Form::label('Cover Image')}}
        {{Form::file('album_cover',['class'=>'form-control'])}}
    </div>
</div>

<div class="form-group">
    {{Form::label('Description') }}
    {{Form::textarea('description', '', ['class'=>'form-control','placeholder'=>'Add a Album Discreption','rows'=>'5'])}}
</div>

<div class="form-group">
    {{ Form::submit('Create Album', ['class'=>'btn btn-success']) }}
</div>
{{Form::close()}}

</div>

@endsection