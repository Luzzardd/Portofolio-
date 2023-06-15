@extends('layouts.main')

@section('konten')
<main>
    <div class="container-fluid px-4">
        <h1 class="my-4">Product</h1>

        <a class="btn btn-primary mb-2" href="{{route('user.create')}}" role="button">Create New</a>

        <div class="card mb-4">
            <div class="card-body">
                <table id="dataTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>role</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>phone </th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach ( $user as $pengguna )
                                <td>{{$loop->iteration}}</td>
                                <td>{{$pengguna->role->name}}</td>
                                <td>{{$pengguna->name}}</td>
                                <td>{{$pengguna->email}}</td>
                                <td>{{$pengguna->phone}}</td>
                                <td>
                                    <form action="{{ route('user.delete', $pengguna->id) }}" method="POST" class="d-inline">
                                        <a href="{{ route('user.edit', $pengguna->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
