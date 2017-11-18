@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-md-offset-2">
                <form method="POST" action="{{ route('clients.store') }}" class="panel panel-default">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        @include('form')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
