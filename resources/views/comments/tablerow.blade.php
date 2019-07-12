<tr id="id_{{$row->id}}">
    <td>{{$row->id}}</td>
    <td>{{$row->user->name}}</td>
    <td>{{$row->created_at->format('d/m/Y H:i')}}hs.</td>
    <td>{!!nl2br($row->comment)!!}</td>
    <td>
        <a href="#" data-id="{{$row->id}}" class="modal-view btn btn-sm btn-success"><i class="fa fa-eye"></i>&nbsp;Ver</a>
        @can('crud_comments_edit')
            <a href="#" data-id="{{$row->id}}" class="modal-edit btn btn-sm btn-primary"><i class="fa fa-edit"></i>&nbsp;Editar</a>
        @endcan
        @can('crud_comments_destroy')
            <a href="#" data-id="{{$row->id}}" class="modal-destroy btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i>&nbsp;Borrar</a>
        @endcan
    </td>
</tr>
