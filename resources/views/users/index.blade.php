@extends('layouts.abm')
<?php $class = 'user'; ?>
@section('grid')
    <h2 class="panel-title">
        <i class="fa fa-users" aria-hidden="true"></i>
        USUARIOS
    </h2>
    <div class="panel-heading">
        <i class="fa fa-list"></i>
        <strong>Lista de Usuarios</strong>
    </div>
    <div class="clearfloat"></div>
    <div class="float-right m-3">
        {!! Form::open(['method'=>'get','class'=>'form-inline']) !!}
            @if (!isset($notAdd) or !$notAdd)
                <a href="{{route($class.'s.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Agregar</a>
            @endif
            <?php if (isset($aPaginate) and is_array($aPaginate)): ?>
                &nbsp;Cantidad por página:&nbsp;
                <select name="paginate" class="form-control changeSubmitParent1">
                    <?php foreach ($aPaginate AS $rsP): ?>
                        <option value="<?=$rsP?>"<?=$rsP == $request->paginate ? ' selected="selected"' : ''?>><?=$rsP?></option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>
            <i class="fa fa-search ml-2" aria-hidden="true"></i>
            <input
                class="form-control ml-2"
                type="text"
                id="buscador"
                name="search"
                placeholder="Buscar"
                aria-label="Buscar"
                value="{{$request->search}}"
            />
            <button class="btn btn-success">Buscar</button>
            @if (!empty($request->search))
                <a class="btn btn-light" href="{{route('users.index')}}">Limpiar</a>
            @endif
        {!! Form::close() !!}
    </div>
    <div class="float-right mt-3 mb-3 ml-3">{{$usuario->appends(['search' => $request->search, 'paginate' => $request->paginate])->links()}}</div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Rol</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @if (count($usuario))
                @foreach($usuario as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->roles->first()->name ?? '-'}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->email}}</td>
                    <td>
                        <a href="{{route('users.show', $row->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i>&nbsp;Ver</a>
                        <a href="{{route('users.edit', $row->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>&nbsp;Editar</a>
                        <a href="{{route('users.destroyform', $row->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i>&nbsp;Borrar</a>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="100%">No se encontraron resultados</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="float-left m-3">{{$usuario->total()}} Usuarios en total</div>
    <div class="float-right m-3">{{$usuario->appends(['search' => $request->search])->links()}}</div>
    <div class="clearfix"></div>
@endsection
