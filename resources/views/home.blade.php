@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p class="text-justify"><strong>Name: </strong>{{ $user->name }}</p>
                        <p class="text-justify"><strong>Email: </strong>{{ $user->email }}</p>
                        <p class="text-justify"><strong>Created at: </strong>{{ $user->created_at }}</p>
                        <p class="text-justify"><strong>Updated at: </strong>{{ $user->updated_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
