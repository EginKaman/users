@extends('layouts.app')
@section('title', 'My visitors')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Visited at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($visitors as $visitor)
                                <tr>
                                    <td><a href="{{ route('user', ['id' => $visitor->id]) }}">{{ $visitor->name }}</a></td>
                                    <td>{{ $visitor->email }}</td>
                                    <td>{{ $visitor->visited_at }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">
                                        <p class="text-center">No visitors yet.</p>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $visitors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

