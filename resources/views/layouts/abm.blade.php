@extends('layouts.app')
@section('content')
<div class="main-row">
    <div class="col-md-12 p-0">
        <div class="panel panel-base">
            <div class="panel-body">
                <div class="container">
                    <div class="panel">
                        @if(session()->get('success'))
                            <div class="alert alert-success">{{session()->get('success')}}</div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <br />
                        @endif
                        @yield('grid')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection