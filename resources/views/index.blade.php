@extends('layout')
<!-- call the yield -->
@section('content')

<style>
    
    .push-top{
        margin-top: 50px;
    }
    .form-group{
        margin-top: 5px;
    }

</style>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                <button class="nav-link" id="nav-product-tab" data-bs-toggle="tab" data-bs-target="#nav-product" type="button" role="tab" aria-controls="nav-product" aria-selected="false">Product</button>
                <button class="nav-link" id="nav-order-tab" data-bs-toggle="tab" data-bs-target="#nav-order" type="button" role="tab" aria-controls="nav-order" aria-selected="false">Order</button>
            </div>
        </nav>

    

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <!-- Button trigger modal -->
            <a href="/addproduct" class="btn btn-primary mt-5" >
            Add Product
            </a>

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
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->product_description}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>&#8369;{{$product->price}}</td>
                    <td>
                    <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary btn-sm" >
            Edit
            </a>
                        
    
                    </td>
                    <td>
                        <a href="/products/status/{{$product->id}} " class=" text-center btn-sm btn {{($product->status == 0) ? 'btn-danger' : 'btn-primary'}}"> {{($product->status == 0) ? 'Enable' : 'Disable'}}</a>
                        
                        
                    </td>
                </tr>
                @endforeach
                
                </tbody>
            </table>
            </div>
            <div class="tab-pane fade" id="nav-product" role="tabpanel" aria-labelledby="nav-product-tab">

                <table class='table table-striped mt-5'>
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Price</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($productsAvail as $productAvailable)
                    <tr>
                        <td>{{$productAvailable->product_name}}</td>
                        <td>{{$productAvailable->product_description}}</td>
                        <td>&#8369;{{$productAvailable->price}}</td>
                    </tr>
                     @endforeach
                     <tr>
                         <th colspan='3' class='text-left'>Total Products: {{$productsAvail->count()}}</th>
                         
                     </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">

                <table class='table table-striped mt-5'>
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->product_name}}</td>
                        <td>&#8369;{{$order->price}}</td>
                         
                    </tr>
                    @endforeach
                    <tr>
                         <th colspan='3' class='text-left'>Total Orders: {{$orders->count()}}</th>
                         
                     </tr>
                    
                    </tbody>
                </table>
            </div>
        </div>
	</div>
</div>




@endsection()