@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Nuevo Usuario</h2>
        </div>
    </div>
    <div class="row">    
        {{ Form::open(['url' => route('users.store'), 'method' => 'POST', 'class' => 'col' ]) }}        
            <div class="form-group">
                {!! Form::label('name','Nombre') !!}
                {!! Form::text('name',null, ['class' => 'form-control', 'required' => 'required' ]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email','Email') !!}
                {!! Form::email('email',null, ['class' => 'form-control', 'required' => 'required'  ]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password','Contraseña') !!}
                {!! Form::password('password',['class' => 'form-control', 'required' => 'required'  ]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('role','Rol') !!}
                {{Form::select("role",$roles, null,
                [
                    "class" => "form-control",
                    "placeholder" => "Seleccione.."
                ])
                }}
            </div>
            {!! Form::button('Guardar', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
        {{ Form::close() }}
    </div>
</div>
@endsection