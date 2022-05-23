@extends('layouts.app')

@section('content')
    <h2 style="text-align: center">Users</h2>
    <div class="container">
        <table class="table" id="users-table">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Date Registration</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td><img class="card-img-top" src="{{ $user->photo }}" alt={{ $user->name }}></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i')}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="container-fluid d-flex h-100 justify-content-center align-items-center p-0 mt-3">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>

    <p class="text-center visually-hidden" id="loading-not-user">No more users...</p>
    <div class="text-center m-3">
        <button class="btn btn-primary" id="show-more" data-page="{{ $page }}">Show more</button>
    </div>
@endsection
