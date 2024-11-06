<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
class productcontroller extends Controller

{
    public function index(){
        $product = product::all();
        return view('products.index', ['products' => $product]);
    }
    public function create(){
        return view('products.create');
     }
    public function store(Request $request){
          $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable',
          ]);
            
        $newProduct = product::create($data);
            
        return redirect(route('products.index'));
            
      }
      public function edit(product $product){
        return view('products.edit', ['product' => $product]);
      }
      public function update(product $product, Request $request) {
        $data = $request-> validate([
        'name' => 'required',
        'qty' => 'required|numeric',
        'price' => 'required|numeric',
        'description' => 'nullable'
    ]);
    $product->update($data);

    return redirect(route('products.index'))->with('succsess', 'product update succsesfully');

  }

  public function destroy(product $product){
        $product->delete();
        return redirect(route('products.index'))->with('succsess', 'product delete succsesfully');
  }
}


