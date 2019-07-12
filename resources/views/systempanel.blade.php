@extends('.layouts.custom')

@section('title', 'Sysadmin Panel')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Sysadmin Panel</div>
                        <div class="card-body">
                            <h4 class="text-center">Welcome, {{auth()->user()->name}}!</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
