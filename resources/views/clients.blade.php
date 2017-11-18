@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-md-offset-2">
                <div class="text-right">
                    <a href="#" class="btn btn-primary">Create</a>
                </div>
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Clients
                    </div>
                    <div class="panel-body">
                        @foreach ($clients as $client)
                            <div>
                                <h3>{{ $client->name }} <small>({{ $client->email }})</small></h3>
                                <p>was created {{ $client->created_at->diffForHumans() }}</p>
                                <p><strong>Location: </strong>{{ $client->location }}</p>
                                <hr>
                            </div>
                        @endforeach
                        <div class="text-center">
                            {{ $clients->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
