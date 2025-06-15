<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            @include('home.header')
        </header>
        <!-- end header section -->


        {{-- product details --}}
        <section class="shop_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Latest Products
                    </h2>
                </div>
                <div class="row g-2">
                    <div class=" col-md-12  ">
                        <div class="card h-100 p-3 "> <!-- Bootstrap card component -->
                            <div class="img-box card-img-top d-flex justify-content-center ">
                                <img src="/productimage/{{ $product->product_image }}" class="img-fluid" alt="{{ $product->product_name }}" style="width: 400px; height: 400px;">
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="card-body detail-box">
                                <h6 class="card-title">{{ $product->product_name }}</h6>
                                <h6 class="card-text">Price:<span
                                        class="text-danger">${{ number_format($product->product_price, 2) }}</span></h6>
                            </div>
                            <div class="card-body detail-box">
                                <h6 class="card-title">Category:{{ $product->category }}</h6>
                                <h6 class="card-text">Available quantity:<span
                                        class="text-danger">{{ $product->product_quantity }}</span></h6>
                            </div>

                            </div>
                             <div>
                                <p class="m-2">{{ $product->product_description }}</p>
                            </div>
                            {{-- <div class="card-footer">
                                <a href="{{ url('add_to_cart', $product->id) }}" class="btn btn-danger">Add to cart</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

    {{-- product details end --}}


    <!-- info section -->

    @include('home.footer')

    <!-- end info section -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
