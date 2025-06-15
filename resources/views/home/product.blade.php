<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Latest Products
            </h2>
        </div>
        <div class="row">
            @foreach ($product as $item)
                <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">

                        <div class="img-box ">
                            <img class="" src="productimage/{{ $item->product_image }}" alt="{{ $item->product_name }}">
                        </div>
                        <div class="detail-box ">
                            <h6 class="fw-bold"> {{ $item->product_name }}</h6>
                            <h6> Price <span>${{ number_format($item->product_price, 2) }} </span></h6>
                        </div>
                     <div>
                        <a href="{{ url('product_details', $item->id) }}" class="btn btn-primary">Details</a>
                        <a href="{{ url('add_to_cart',$item->id) }}" class="btn btn-danger">Add to cart</a>

                     </div>

                </div>



                </div>
                 @endforeach

        </div>

        <div class="d-flex justify-content-center m-3">
            {{ $product->onEachSide(1)->links() }}
        </div>


    </div>
    <div class="btn-box">
        <a href="">
            View All Products
        </a>
    </div>
    </div>
</section>
