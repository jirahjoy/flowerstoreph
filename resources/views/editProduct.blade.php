@extends('layout')
<!-- calling the yield -->
@section('content')

<style>
    .container{
        max-width:500px;
    }
    .push-top{
        margin-top: 50px;
    }
    .form-group{
        margin-top: 10px;
    }

</style>

<div class="card push-top">
    <h5 class='mx-3 mt-3'>Edit Product</h5>
    <div class="card-body">
                     @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                    @foreach($errors->all() as $error)
                                    <li >{{$error}}</li>
                                     @endforeach
                                    </ul>
                                </div>
                     @endif
                             
                                             

                            <form action="{{route('products.update', $products->id)}}" method="POST" >
                                <!-- Cross Site Request Forgery-->
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="productName">Product Name:</label>
                                    <input type="text" class="form-control" name="product_name" id='productName' value='{{$products->product_name}}'>
                                </div>
                                <div class="form-group">
                                    <label for="productDescription">Product Description:</label>
                                    <input type="text" class="form-control" name="product_description" id='productDescription' value='{{$products->product_description}}'>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" class="form-control" name="quantity" id='quantity' value='{{$products->quantity}}'>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price:</label>
                                    <input type="text" class="form-control" name="price" id='price' value='{{$products->price}}'>
                                </div>
                                <input class="btn btn-primary mt-5" type='submit' name='submit' value='Edit Product' id='btn-submit'>
                    </form>

    </div>
</div>

@endsection()