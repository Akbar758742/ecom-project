<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        input[type=text] {
            width: 230px;
            height: 30px;


        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30ps;
        }
        .table_deg{
           margin: auto;
          text-align: center;
          margin-top: 50px  ;
            border: 2px solid yellowgreen;
            width: 600px;

        }
        th{
            background-color:skyblue;
            font-size: 20px;
            color: white;
            padding: 10px;
            font-weight: bold;
        }
        td{
            color: white;
            padding: 10px;
            border: 2px solid skyblue;
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
                    <h2 class="h5 no-margin-bottom">Dashboard</h2>
                </div>
                <h1 style="color: white">Add Category</h1>
                <div class="div_deg">
                <form action="{{url('add_category')}}" method="POST">
                    @csrf
                    <input type="text" name="category">
                    <input type="submit" value="Add Category" class="btn btn-primary">

                </form>
            </div>
            

            </div>
            {{-- @include('admin.body') --}}
            <div>
                <table class="table_deg">
                    <tr>
                        <th>Category Name</th>
                        <th>edit</th>
                        <th>Delete</th>
                        
                    </tr>
                    @foreach ( $data as $data )
                         <tr>
                     <td>{{ $data->category_name }}</td>
                     <td> <a class="btn btn-success" href="{{ url('edit_category', $data->id) }} ">edit </a>   </td>
                     <td> <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_category', $data->id) }} ">delete </a>   </td>
                    </tr>
                    @endforeach
                   
                   
                </table>
            </div>

        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
