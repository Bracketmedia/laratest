@extends('layouts.abm')
<?php $class = 'comment'; $notAdd = true; ?>
@section('grid')
<div class="main-row">
    <div class="col-md-12 p-3">
        <div class="card uper">
            <div class="card-header">
                Ver Comentario
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
                            <span class="form-control">{{$comment->user->name}}</span>
                        </div>
                    </div>
                    <div class="col">
                        <label>Fecha/Hora:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-history"></i>
                                </div>
                            </div>
                            <span class="form-control">{{$comment->created_at->format('d/m/Y H:i')}}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Comentario:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-comment"></i>
                                    </div>
                                </div>
                                <textarea class="form-control" readonly="readonly" rows="12">{{$comment->comment}}</textarea>
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
