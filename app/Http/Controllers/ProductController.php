<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $productsAvail = Product::where('status', '=', '1')->get();
        $orders = Order::select([
            'orders.id',
            'products.product_name',
            'orders.price'
        ])->join('products', function($join){
            $join->on('orders.product_id','=','products.id');
        })->get();
       
        return view('index', ['products'=>$products, 'orders'=>$orders, 'productsAvail'=>$productsAvail]);
        
    }

     

     public function create()
     {  
        $products = Product::all();
         return view('addProduct');
      
     }

     

     public function store(Request $request)
     {
       
         $storedData = $request->validate([
             'product_name'=>'required|max:255',
             'product_description'=>'required|max:255',
             'quantity'=>'required|numeric',
             'price'=>'required|regex:/^\d+(\.\d{1,2})?$/'
         ]);

         $products = Product::create($storedData);
       
         
       
            return redirect('products')->with('Completed', 'Product has been saved.');
        
       
         
       
     }

    

     
    public function edit($id)
    {
       
        $products = Product::findorfail($id);
        return view('editProduct', compact('products'));
    }

    public function update(Request $request, $id)
    {
        // updates clients data to update the database by clicking update button

        $updateData = $request->validate([
            'product_name'=>'required|max:255',
            'product_description'=>'required|max:255',
            'quantity'=>'required|numeric',
            'price'=>'required|regex:/^\d+(\.\d{1,2})?$/'
        ]);

        Product::whereId($id)->update($updateData);
        return redirect('products')->with('Completed', 'Product has been updated.');
    }


    public function updateStatus(Request $request, $id)
    {
       
        $product = Product::whereId($id)->first();
        if($product->status == 0){
            $product->status = 1;
        } else{
            $product->status = 0;
        }
        $product->save();
        
        return redirect('products')->with('Completed', 'Product has been updated.');
    }

     public function show()
     {
         return true;
     }


     

    
}
