@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-md-offset-2">
                <div class="text-right">
                    <a href="{{ route('clients.create') }}" class="btn btn-primary">Create</a>
                </div>
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Clients
                    </div>
                    <div class="panel-body">
                        @foreach ($clients as $client)
                            <div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <h3><a href="{{ route('clients.show', $client) }}">
                                            {{ $client->name }}
                                        </a> <small>({{ $client->email }})</small></h3>
                                        <p>was created {{ $client->created_at->diffForHumans() }}</p>
                                        <p><strong>Location: </strong>{{ $client->location }}</p>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning">Edit</a>
                                        <br>
                                        <br>
                                        <form method="POST" action="{{ route('clients.destroy', $client) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
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
