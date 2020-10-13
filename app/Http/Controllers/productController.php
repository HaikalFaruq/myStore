<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $product = Product::paginate(5);
      return view('product', compact('product'));
    }

    public function showProduct($slug)
    {
      $data = Product::where('product_slug', $slug)
              ->firstOrFail();
      return view('product.show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request, Product $product)
    {
      $product = new Product;
      $product->product_title = $request->product_title;
      $product->product_slug = \Str::slug($request->product_title);
      $product->product_image = $request->product_image;
      if(Product::where('product_slug', $product->product_slug)->exists()){
        return redirect('/product/create')->with('error', 'Product udah ada boy!');
      } else {
        $product->save();
        return redirect('product');
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
       
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
      $data = Product::where('product_slug', $slug)->first();
      return view('product.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $data = [
        'id' => $request->id,
        'product_title' => $request->product_title,
        'product_slug' => \Str::slug($request->product_title),
        'product_image' => $request->product_image,
      ];
      // $product->update($request->all());

      if (Product::where('product_slug', \Str::slug($request->product_title))->exists()) {
        $ubah = [
          'id' => $request->id,
          'product_image' => $request->product_image,
        ];
        Product::where('id', $request->id)->update($ubah);
        Toastr::warning('Data ' . $request['product_title'] . ' not changed, but another data is still changed','Warning');
        return redirect('product');
      } else {
        Product::where('id', $request->id)->update($data);
        Toastr::success('Data ' . $request['product_title'] . ' successfully changed','Success');
        return redirect('product');
      }    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      $product->delete();
      return redirect('/product');
    }
}