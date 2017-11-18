@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Client
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('clients.update', $client) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            @include('form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
