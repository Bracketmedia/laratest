@extends('.layouts.custom')

@section('title', 'Users')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">User #{{$user->id}}</div>
                        <div class="card-body">
                            <p class="text-center">{{$user->name}}</p>
                            <p class="text-center">{{$user->email}}</p>
                            <p class="text-center">{{$user->roles->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
