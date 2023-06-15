@extends('layouts.main')

@section('konten')
<main>
    <div class="container-fluid px-4">
        <h1 class="my-4">Daftar Role</h1>

        <a class="btn btn-primary mb-2" href="{{route('role.create')}}" role="button">Create New</a>

        <div class="card mb-4">
            <div class="card-body">
                <table id="dataTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $roles as $role )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$role->name}}</td>
                                <td>
                                    <form action="{{ route('role.delete', $role->id) }}" method="POST" class="d-inline">
                                        <a href="{{ route('role.edit', $role->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
