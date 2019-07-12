@extends('layouts.abm')
<?php $class = 'comment'; $notAdd = true; ?>
@section('grid')
<div class="main-row">
    <div class="col-md-12 p-3">
        <div class="card uper">
            <div class="card-header">
                Agregar Comentario
            </div>
            <div class="card-body">
                <form method="post" action="{{route($class.'s.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="comment">Comentario:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-comment"></i>
                                        </div>
                                    </div>
                                    <textarea class="form-control" id="comment" name="comment" rows="12">{{old('comment')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success">Agregar</button>
                    <a href="{{route($class.'s.index')}}" class="btn btn-sm btn-light"><i class="fa fa-times"></i>&nbsp;Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
