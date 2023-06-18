<!DOCTYPE html>
<html lang="en" >

<head >
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Item - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>

<body style="background-color: #F4DFBA ">
    <!-- Navigation-->
    <style>
        .navbar{
            background-color: #331f19;
        }
    </style>
    <nav class="navbar" class="navbar navbar-expand-lg navbar-light bg-light" >
        <div class="container px-4 px-lg-5"  >
            <a class="navbar-brand fw-bolder" href="#" style="color: #fff">SapiQ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            </div>
        </div>
    </nav>

    <!-- Product section-->
    <section  class="py-5" >
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                @if ($product->image)
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{asset('storage/product/'. $product->image)}}" alt="{{$product->image}}" /></div>
                @else
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset('images/default-product-detail.png') }}" alt="default-image" /></div>
                @endif

                <div class="col-md-6">
                    <div class="small mb-1">{{$product->category->name}}</div>
                    <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                    <div class="fs-5 mb-5">
                        <span class="text-decoration-line-through">Rp.{{ number_format($product['price'], 0) }}</span>
                        <span>Rp.{{ number_format($product->sale_price, 0) }}</span>
                    </div>
                    <p class="lead">{{$product->description}}</p>
                    <div class="d-flex">
                        <a href="https://api.whatsapp.com/send?phone=085717015700" class="btn btn-outline-dark flex-shrink-0">
                            <i class="fa-brands fa-whatsapp"></i>
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related items section-->
    <style>
        .warna
        {
            background-color: #EEC373;

        }
        .sec
        {
            background-color: #fadba5;
        }
    </style>
    <section class="sec" class="py-5 bg-light" >
        <div class="container px-4 px-lg-5 mt-5" >
            <h2 class="fw-bolder mb-4">Related products</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($related as $rel)
                    <div class="col mb-5">
                        <div class="warna" class="card h-100">
                            <!-- Product image-->
                            @if ($product->image)
                                <img class="card-img-top" src="{{asset('storage/product/'. $rel->image)}}" alt="..." />
                            @endif
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$rel->name}}</h5>
                                    <!-- Product price-->
                                    Rp.{{ number_format($rel['sale_price'], 0) }}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('product.show', ['id' => $rel->id]) }}">View options</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 " style="background-color: #331f19">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="https://kit.fontawesome.com/031855bb65.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
