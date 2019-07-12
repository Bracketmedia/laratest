@extends('layouts.abm')
<?php $class = 'comment'; $notAdd = true; ?>
@section('grid')
<div class="main-row">
    <div class="col-md-12 p-3">
        <div class="card uper">
            <div class="card-header">
                Eliminar Comentario
            </div>
            <div class="card-body">
                <form method="post" action="{{route($class.'s.destroy', $comment->id)}}">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="col">
                            <label>Nombre:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control focus" value="{{$comment->user->name}}" readonly="readonly" disabled="disabled" />
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
                                <input type="text" class="form-control focus" value="{{$comment->created_at->format('d/m/Y H:i')}}" readonly="readonly" disabled="disabled" />
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
                                    <textarea class="form-control" readonly="readonly" disabled="disabled" rows="12">{{$comment->comment}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                    <a href="{{route($class.'s.index')}}" class="btn btn-sm btn-light"><i class="fa fa-times"></i>&nbsp;Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
