<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }

        table {
            margin: auto;
            text-align: center;
            margin-top: 50px;
            border: 2px solid black;
            width: 80%;

        }

        th {
            background-color: skyblue;
            font-size: 20px;
            border: 2px solid black;
        }

        td {
            font-size: 20px;
            border: 2px solid black;
        }
        .order_deg{



        }
        label{
            display: inline-block;
            width: 150px;
        }
        .div-gap{
            margin: 10px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            @include('home.header')
        </header>
        <!-- end header section -->

    </div>
    <!-- end hero area -->


    {{-- product cart details --}}

    <div class="div_deg">
        <div class="order_deg">
            <form action="{{ url('place_order') }}" method="post" enctype="multipart/form-data"  method="POST">
                @csrf
                <div class="div-gap">
                    <label for="">Reciever name</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" placeholder="Reciever name" required>
                </div>
                <div class="div-gap">
                    <label for="">Reciever address</label>
                    <textarea name="address" id="" cols="30" rows="5" > {{ Auth::user()->address }} </textarea>
                </div>
                <div class="div-gap">
                    <label for="">Reciever phone</label>
                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" placeholder="Reciever phone" required>
                </div>
                <div class="div-gap">

                    <input type="submit" name="submit" value="place order" class="btn btn-primary" required>
                </div>

            </form>
        </div>
        <table>
            <tr>
                <th>product title</th>
                <th>price</th>
                <th>image</th>
                <th>remove</th>
            </tr>
            <?php
            $value = 0; ?>
            @foreach ($cart as $cart)
                <tr>
                    <td>{{ $cart->product->product_name }}</td>
                    <td>{{ $cart->product->product_price }}</td>
                    <td><img width="150px" src="/productimage/{{ $cart->product->product_image }}"
                            alt="{{ $cart->product->product_name }}"></td>
                    <td><a href="{{ url('remove_cart', $cart->id) }}" class="btn btn-danger">Remove</a></td>
                </tr>
                <?php $value = $value + $cart->product->product_price;
                ?>
            @endforeach

        </table>
    </div>
    <div class="div_deg">
        <h1>Total Price: {{ $value }}TK</h1>
    </div>

    {{-- end product cart details --}}





    <!-- info section -->

    @include('home.footer')

    <!-- end info section -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
