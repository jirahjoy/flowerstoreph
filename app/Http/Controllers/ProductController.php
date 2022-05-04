<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function create()
     {
         return view('addproduct');
     }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
     {
         $storedData = $request->validate([
             'product_name'=>'required|max:255',
             'product_description'=>'required|max:255',
             'quantity'=>'required|numeric',
             'price'=>'required|regex:/^\d+(\.\d{1,2})?$/'
         ]);
         $products = Product::create($storedData);

         return redirect('products')->with('Completed', 'New product has been saved.');
        //  return  'New product has been saved.';
     }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function show()
     {
         return true;
     }

    
}
