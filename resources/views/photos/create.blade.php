@extends('layouts.app')

@section('content')
    <h3>Upload Photo</h3>
    {!! Form::open(['action' => 'PhotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {!! Form::text('title', '', ['placeholder' => 'Photo Title']) !!}
        {!! Form::textarea('description', '', ['placeholder' => 'Photo Description']) !!}
        {!! Form::hidden('album_id', $album_id) !!}
        {!! Form::file('photo') !!}
        {!! Form::submit('submit') !!}
    {!! Form::close() !!}
@endsection
