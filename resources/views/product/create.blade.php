@extends('layouts.main')

@section('konten')
    <main>
        <div class="container-fluid px-4">
            <h1 class="my-4">Create Product</h1>

            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select  " aria-label="category" id="category" name="category">
                                <option selected disabled>- Choose Category -</option>
                                @foreach ($category as $kategori)
                                    <option value="{{$kategori->id}}" >{{$kategori->name}}</option>
                                @endforeach
                            </select>



                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control " id="name" value="" name="name" required>



                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control " id="price" value="" name="price" required>

                        </div>
                        <div class="mb-3">
                            <label for="sale-price" class="form-label">Sale Price</label>
                            <input type="text" class="form-control " id="sale-price" value="" name="sale_price" required>

                        </div>
                        <div class="mb-3">
                            <label for="brand" class="form-label">Brand</label>
                            <select class="form-select " aria-label="brand" id="brand" name="brand">
                                <option selected disabled>- Choose Brand -</option>
                                @foreach ($brand as $brands)
                                    <option value="{{$brands->name}}">{{$brands->name}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Product Image</label>
                            <input class="form-control " type="file" name="image" id="image" accept=".jpg, .jpeg, .png., .webp">

                        </div>
                        <div class="mb-3">
                            <label for="rating" class="form-label">rating</label>
                            <input class="form-control " type="number" name="rating" id="rating" >

                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
