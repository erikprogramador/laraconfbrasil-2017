@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $client->name }} was created {{ $client->created_at->diffForHumans() }}
                    </div>
                    <div class="panel-body">
                        <span><strong>E-mail:</strong> {{ $client->email }}</span>
                        <p><strong>Location: </strong>{{ $client->location }}</p>
                    </div>

                    <div class="panel-footer level">
                        <a href="{{ route('clients.edit', $client) }}" class="btn btn-link">Edit</a>
                        <form method="POST" action="{{ route('clients.destroy', $client) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-link">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
