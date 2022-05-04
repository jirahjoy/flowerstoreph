@extends('layout')
<!-- call the yield -->
@section('content')

<ul class="nav nav-tabs mt-5">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="index.php">Products</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="addproduct">Order</a>
  </li>
  
</ul>

<table class='table table-striped mt-5'>
    <thead>
    <tr>
        <th>Product Name</th>
        <th>Product Description</th>
        <th>Price</th>
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

<table class='table table-striped mt-5'>
    <thead>
    <tr>
        <th>Order ID</th>
        <th>Product Name</th>
        <th>Price</th>
    </tr>
    </thead>

    <tbody>
    <tr>
        <td>1</td>
        <td>roses</td>
        <td>2000</td>  
    </tr>
    <tr>
        <td>2</td>
        <td>roses</td>
        <td>2000</td>  
    </tr>
    </tbody>
</table>

@endsection()