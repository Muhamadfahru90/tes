@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Data User</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if (Cache::has('user-is-online-' . $user->id))
                                            <span class="text-success">Online</span>
                                        @else
                                            <span class="text-secondary">Offline</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ url("/users/$user->id") }}">
                                            @csrf @method('DELETE')
                                            <a href="{{ url("/users/$user->id/edit") }}"
                                                class="badge bg-info text-white">edit</a>
                                            @if (Cache::has('user-is-online-' . $user->id))
                                                <span class="text-success"></span>
                                            @else
                                                <button type="submit" class="badge bg-danger text-white">delete</button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
