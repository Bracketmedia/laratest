@extends('layouts.abm')
<?php $class = 'comment'; ?>
@section('grid')
    <h2 class="panel-title">
        <i class="fa fa-users" aria-hidden="true"></i>
        COMENTARIOS
    </h2>
    <div class="panel-heading">
        <i class="fa fa-list"></i>
        <strong>Lista de Comentarios</strong>
    </div>
    <div class="clearfloat"></div>
    <div class="float-right m-3">
        {!! Form::open(['method'=>'get','class'=>'form-inline']) !!}
            @if (!isset($notAdd) or !$notAdd)
                <a href="{{route($class.'s.create')}}" data-action="{{route('comments.store')}}" data-url="{{route('comments.index')}}" class="modal-create btn btn-success"><i class="fa fa-plus"></i>&nbsp;Agregar</a>
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
                <a class="btn btn-light" href="{{route('comments.index')}}">Limpiar</a>
            @endif
        {!! Form::close() !!}
    </div>
    <div class="float-right mt-3 mb-3 ml-3">{{$comment->appends(['search' => $request->search, 'paginate' => $request->paginate])->links()}}</div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Autor</th>
                <th>Fecha/Hora</th>
                <th>Comentario</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody id="htmlTBody">
            @if (count($comment))
                @foreach($comment as $row)
                    @include('comments.tablerow')
                @endforeach
            @else
                <tr>
                    <td colspan="100%">No se encontraron resultados</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="float-left m-3">{{$comment->total()}} Comentarios en total</div>
    <div class="float-right m-3">{{$comment->appends(['search' => $request->search])->links()}}</div>
    <div class="clearfix"></div>

    <input type="hidden" id="urlabm" value="{{route('comments.index')}}" />

    <div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="crudModal"></h4>
                </div>
                <div class="modal-body">
                    <form id="modalForm" name="modalForm" class="form-horizontal">
                       <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Comentario:</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" id="comment" name="comment" placeholder="Ingrese un comentario" required="" rows="12"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="modal-submit btn btn-primary" id="btn-save" value="create">Guardar
                    </button>
                    <button type="button" class="btn btn-secondary" id="btn-cancel">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
