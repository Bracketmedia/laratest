@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-end mb-3">
        <div class="col-2">
            <a href="{{ route('users.create') }}" class="btn btn-primary">Nuevo Usuario</a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Registrado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ Date('d/m/Y', strtotime($user->created_at)) }}</td>
                    <td>
                        <div class="btn-group btn-group-toggle">
                            <a  href="{{ route('users.edit',['id' => $user->id]) }}" class="btn btn-secondary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a  href="{{ route('users.delete',['id' => $user->id]) }}" class="btn btn-secondary delete">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>    
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.btn.delete').click(function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            if(confirm('¿Seguro que desea eliminar al usuario?')){
                location.href = href;
            }
        })
    })
</script>

@endsection