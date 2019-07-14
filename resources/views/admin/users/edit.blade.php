@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Actualizar Usuario</h2>
        </div>
    </div>
    <div class="row">    
        {{ Form::open(['url' => route('users.update', ['id' => $user->id]), 'method' => 'PUT', 'class' => 'col' ]) }}        
            <div class="form-group">
                {!! Form::label('name','Nombre') !!}
                {!! Form::text('name',$user->name, ['class' => 'form-control', 'required' => 'required' ]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email','Email') !!}
                {!! Form::email('email',$user->email, ['class' => 'form-control', 'required' => 'required'  ]) !!}
            </div>
            {!! Form::button('Guardar', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
        {{ Form::close() }}
    </div>
</div>
@endsection