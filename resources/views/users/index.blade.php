@extends('.layouts.custom')

@section('title', 'Users')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Users</div>
                        <div class="card-body">
                            <nav class="navbar navbar-light bg-light">
                                <a role="button" class="btn btn-primary"
                                   href="{{ route('register') }}">New User</a>
                            </nav>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Role</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>

                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->roles->name}}</td>
                                        <td><a role="button" class="btn btn-primary"
                                               href="{{action('UserController@show', ['id' => $user->id])}}">Show</a>
                                        </td>
                                        <td><a role="button" class="btn btn-success"
                                               href="{{action('UserController@edit', ['id' => $user->id])}}">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{url("/users/{$user->id}")}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <input type="hidden" name="id" id="id" value="{{$user->id}}">
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
