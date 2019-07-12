@extends('layouts.abm')
<?php $class = 'user'; $notAdd = true; ?>
@section('grid')
<div class="main-row">
    <div class="col-md-12 p-3">
        <div class="card uper">
            <div class="card-header">
                Eliminar Usuario
            </div>
            <div class="card-body">
                <form method="post" action="{{route($class.'s.destroy', $usuario->id)}}">
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
                                <input type="text" class="form-control focus" value="{{$usuario->name}}" readonly="readonly" disabled="disabled" />
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
                                    <input type="text" class="form-control" value="{{$usuario->email}}" readonly="readonly" disabled="disabled" />
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
