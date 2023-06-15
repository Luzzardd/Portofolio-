@extends('layouts.main')

@section('konten')
    <main>
        <div class="container-fluid px-4">
            <h1 class="my-4">Product</h1>

            <a class="btn btn-primary mb-2" href="{{route('product.create')}}" role="button">Create New</a>

            <div class="card mb-4">
                <div class="card-body">
                    <table id="dataTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>price</th>
                                <th>Sale Price </th>
                                <th>Brand</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $product as $produk )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$produk->category->name}}</td>
                                    <td>{{$produk->name}}</td>
                                    <td>{{$produk->price}}</td>
                                    <td>{{$produk->sale_price}}</td>
                                    <td>{{$produk->brands}}</td>
                                    <td><img src="{{asset('storage/product/'.$produk->image)}}" width="50px" height="50px" alt="{{$produk->image}}"></td>
                                    <td>
                                        <form action="{{route('product.delete',$produk->id)}}" method="POST">
                                            <a href="{{route('product.edit',$produk->id)}}" class="btn btn-sm btn-warning">Edit</a>
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
