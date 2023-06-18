@extends('layouts.main')

@section('konten')
    <main>
        <div class="container-fluid px-4">
            <h1 class="my-4">Category</h1>

            <a class="btn btn-primary mb-2" href="{{route('category.create')}}" role="button">Create New</a>

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
                            @foreach ( $category as $kategori )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$kategori->name}}</td>
                                    <td>
                                        <form action="{{route('category.delete',$kategori->id)}}">
                                            <a href="{{route('category.edit',$kategori->id)}}" class="btn btn-sm btn-warning">Edit</a>
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
