@extends('layouts.main')

@section('konten')
<main>
    <div class="container-fluid px-4">
        <h1 class="my-4">Slider</h1>

        <a class="btn btn-primary mb-2" href="{{route('slider.create')}}" role="button">Create New</a>

        <div class="card mb-4">
            <div class="card-body">
                <table id="dataTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Caption</th>
                            <th>Image</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slider as $iklan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $iklan->title }}</td>
                                <td>{{ $iklan->caption }}</td>
                                <td>
                                    <img src="{{ asset('storage/slider/' . $iklan->image) }}" class="img-fluid" style="max-width: 100px;"
                                            alt="{{ $iklan->image }}">
                                </td>

                                <td>
                                    <form onsubmit="return confirm('Are you sure? ');" action="{{route('slider.delete', $iklan->id)}}" method="POST">
                                        <a href="{{route('slider.edit',$iklan->id)}}" class="btn btn-sm btn-warning">Edit</a>
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
