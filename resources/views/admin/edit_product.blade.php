<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
      .div_deg{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px;
      }
      input[type=text] {
        width: 230px;
        height: 30px;
      }
      label{
        display: inline-block;
        width: 200px;
        text-align: left;
        font-size: 18px;
        color: white!important;
      }
      textarea{
        width: 350px;
        height: 80px;
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
        </div>
  

        <h1 style="color: white" >update Product</h1>
      <div class="div_deg">
        <form action="{{url('update_product', $product->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div>
            <label for="title">product title</label>
           <input type="text" name="title" value="{{ $product->product_name }}" required>
          </div>
          <div>
            <label for="title">description</label>
          <textarea name="description"  cols="30" rows="10" value=""  >{{ $product->product_description }}</textarea>
          </div>
          <div>
            <label for="title">price</label>
           <input type="text" name="price"  value="{{ $product->product_price }}"  required>
          </div>
          <div>
            <label for="title">quantity</label>
           <input type="text" name="quantity"  value="{{ $product->product_quantity }}" required>
          </div>
          <div>
            <label for="title">product category</label>
           <select name="product_category" id="" required>
            <option value="">select a category</option>
             @foreach($category as $category)
             
             <option value="{{$category->category_name}}">{{$category->category_name}}</option>
             @endforeach
           </select>
          </div>
          <div>
            <label for="">current image</label>
            <img height="50px" width="50px" src="/productimage/{{ $product->product_image }}" alt="">
          </div>
          <div>
            <label for="title">new image</label>
           <input type="file" name="product_image" >
          </div>
          
          <input type="submit" value="update Product" class="btn btn-success">
        </form>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>