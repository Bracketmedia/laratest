@extends('layouts.abm')
<?php $class = 'user'; $notAdd = true; ?>
@section('grid')
<div class="main-row">
    <div class="col-md-12 p-3">
        <div class="card uper">
            <div class="card-header">
                Agregar Usuario
            </div>
            <div class="card-body">
                <form method="post" action="{{route($class.'s.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control focus" id="name" name="name" value="{{old('name')}}" />
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" />
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
