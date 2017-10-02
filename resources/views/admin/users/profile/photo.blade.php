@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Upload Image</h1>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=> ['admin.users.profile.photo.store', $user->id],'method' => 'post','enctype' => "multipart/form-data"]) !!}

    <div class="form-group">
        {!! Form::label('image','Image:') !!}
        {!! Form::file('image', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-3">
                {!! Form::submit('Upload Image',['class' => 'btn btn-primary form-control']) !!}
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.users.index') }}" class="btn btn-success form-control">Voltar</a>
            </div>


        </div>
    </div>


    {!! Form::close() !!}
</div>
@endsection
