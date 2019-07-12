@extends('layouts.abm')
<?php $class = 'user'; $notAdd = true; ?>
@section('grid')
<div class="main-row">
    <div class="col-md-12 p-3">
        <div class="card uper">
            <div class="card-header">
                Ver Usuario
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label>Nombre:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <span class="form-control">{{$usuario->name}}</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Email:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                </div>
                                <span class="form-control">{{$usuario->email}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{route($class.'s.index')}}" class="btn btn-sm btn-success">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection
