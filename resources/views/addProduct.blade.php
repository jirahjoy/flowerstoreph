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
    <h5 class='mx-3 mt-3'>Add Product</h5>
    <div class="card-body">

        <div class="alert alert-danger">
            <ul>
                <li>error here</li>
            </ul>
        </div>

        <form action="{{route('products.store')}}" method="POST">
            <!-- Cross Site Request Forgery-->
            @csrf
            <div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" class="form-control" names="product_name" id='productName'>
            </div>
            <div class="form-group">
                <label for="productDescription">Product Description:</label>
                <input type="text" class="form-control" name="product_description" id='productDescription'>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="text" class="form-control" name="quantity" id='quantity'>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" name="price" id='price'>
            </div>
            <div class='form-group'>
            <input class="btn btn-primary" type='submit' name='submit' value='Add Product'>
            </div>
        </div>
        </form>

    </div>
</div>

<table class='table table-striped mt-5'>
    <thead>
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Description</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Edit</th>
        <th>Status</th>
    </tr>
    </thead>

    <tbody>
    <tr>
        <td>Bouquet</td>
        <td>12 roses</td>
        <td>2000</td>  
    </tr>
    <tr>
        <td>Bouquet</td>
        <td>12 roses</td>
        <td>2000</td>  
    </tr>
    </tbody>
</table>


@endsection()