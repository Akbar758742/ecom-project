<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
 width: 800px;
        }

        input[type=text] {
            width: 230px;
            height: 30px;
        }

        table {
            margin: auto;
            text-align: center;
            margin-top: 50px;
            border: 2px solid yellowgreen;
width: 80%;

        }

        th {
            background-color: skyblue;
            font-size: 15px;
            color: white;
        }

        td {
            font-size: 15px;
            color: white;
            border: 2px solid yellowgreen;
        }
    </style>
</head>

<body>
    <header class="header">
        @include('admin.header')
    </header>
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <div class="div_deg" >
                        <form action="{{ url('search_product') }}" method="get">
                            @csrf
                        <input type="search" name="search" placeholder="Search Product"
                            style="width: 500px; height: 30px">
                        <button type="submit" class="btn btn-primary">Search</button>

                    </form>
                    </div>
                    <div class="div_deg">
                        <table class="table_deg">
                            <tr>
                                <th>Product Title</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>edit</th>

                                <th>delete</th>


                            </tr>

                            @foreach ($product as $products)
                                <tr>
                                    <td>{{ $products->product_name }}</td>
                                    <td>{!! Str::limit($products->product_description, 50) !!}</td>
                                    <td>{{ $products->category_id }}</td>
                                    <td>{{ $products->product_price }}</td>
                                    <td>{{ $products->product_quantity }}</td>
                                    <td><img src="/productimage/{{ $products->product_image }}"
                                            style="width: 130px; height: 130px"></td>

                                    <td><a href="{{ url('edit_product', $products->id) }}"
                                            class="btn btn-success">Edit</a></td>

                                    <td><a onclick="confirmation(event)"
                                            href="{{ url('delete_product', $products->id) }}"
                                            class="btn btn-danger">Delete</a></td>




                                </tr>
                            @endforeach


                        </table>

                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $product->onEachSide(1)->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
</body>

</html>
