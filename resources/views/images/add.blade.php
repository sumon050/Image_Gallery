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
{!!Form::open(['url' => 'images.insert'.$gallery->id,'method'=>'post','enctype'=>'multipart/form-data','files' => true])!!}

<div class="form-group">
    {!! Form::label('Album Name') !!}
    {!!Form::text('album_title',$vlaue=$gallery->album_title,['class'=>'form-control', 'readonly'])!!}
</div>

<div class="form-group">
    {!!Form::label('Image Name') !!}
    {!!Form::text('image_name','', ['class'=>'form-control','placeholder'=>'Enter Image Name'])!!}
</div>

<div class="control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
        {!!Form::label('Upload Image')!!}
        {!!Form::file('image_title',['class'=>'form-control'])!!}
    </div>
</div>

<div class="form-group">
    {!! Form::submit('Add Image', ['class'=>'btn btn-success']) !!}
</div>
{!!Form::close()!!}

</div>

@endsection