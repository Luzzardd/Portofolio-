<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/landing.css')}}" rel="stylesheet" />
    </head>
    <body style="background-color: #F4DFBA ">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark "  style="background-color: #331f19;">
            <div  class="container px-4 px-lg-5">
                <a class="navbar-brand fw-bolder" href="#!">SapiQ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('landing')}}">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Category</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{route('landing')}}">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                @foreach ($category as $kategori )
                                <li><a class="dropdown-item" href="{{ route('landing', ['category' => $kategori->name]) }}">{{$kategori->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-light" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-light text-dark ms-1 rounded-pill">0</span>
                        </button>
                        <a href="{{route('login')}}" class="btn btn-outline-light ms-1">
                            <i class="bi-person-fill me-1"></i>
                            login
                        </a>
                    </form>
                </div>
            </div>
        </nav>
        <!-- carausel-->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
            @foreach ($sliders as $slider)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->iteration - 1 }}" class="{{ $loop->first ? 'active' : '' }}"
            aria-current="{{ $loop->first ? 'true' : '' }}" aria-label="Slide {{ $loop->iteration }}"></button>
            @endforeach
            </div>
            <div class="carousel-inner">
            @foreach ($sliders as $slider)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="{{ $loop->iteration }}0000">
                <img src="{{ asset('storage/slider/' . $slider->image) }}" class="d-block w-100" alt="{{ $slider->image }}">
                <div class="carousel-caption d-none d-md-block">
                <h5>{{ $slider->title }}</h5>
                <p>{{ $slider->caption }}</p>
                </div>
            </div>
            @endforeach
            </div>
            <button class="carousel-control-prev"  type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon  " aria-hidden="true"></span>
            <span class="visually-hidden" >Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Section-->

        <section class="py-4">
            <div class="container px-4 px-lg-5 ">
                <div class="navbar-brand fw-bolder fs-1">
                    Product
                </div>
                <form action="{{ route('landing') }}" method="GET">
                    @csrf
                    <div class="row g-3 my-3">
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Min" name="min" value="{{ old('min') }}">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Max" name="max" value={{ old('max') }}>
                        </div>
                        <div   class="col-sm-3">
                            <button type="submit" class="btn"  style="background-color: #EEC373 ">Terapkan</button>
                        </div>
                    </div>
                </form>

                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ( $products as $produk )
                    <div class="col mb-5">
                        <div class="card h-100" style="background-color: #EEC373 ">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{asset('storage/product/'. $produk->image)}}" alt="{{$produk->image}}" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <small class="text-strong">{{ $produk->category->name }}</small>
                                    <h5 class="fw-bolder">{{$produk->name}}</h5>
                                    <!-- Product price-->
                                    @if ($produk['sale_price'] != 0)
                                    <span class="text-muted text-decoration-line-through">Rp.{{ number_format($produk['price'], 0) }}</span> <br>
                                    Rp.{{ number_format($produk['sale_price'], 0) }}
                                @else
                                    Rp.{{ number_format($produk['price'], 0) }}
                                @endif
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto"  href="{{route('login')}}">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 "  style="background-color: #331f19;">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
