<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    function AddProduct(Request $req)
    {
        $product = new Product;

        $product->name = $req->input('name');
        $product->price = $req->input('price');
        $product->description = $req->input('description');
        $product->file_name = $req->file('file')->store('products');
        $product->save();
        return $product;
    }

    function List()
    {
        $product = Product::all();
        return $product;
    }

    function Delete($id)
    {
        $result = Product::where('id', $id)->delete();

        if ($result) {
            return ['result' => 'item has been deleted'];
        } else {
            return ['error' => 'no item deleted'];
        }
    }

    function singleProduct($id)
    {
        return Product::find($id);
    }


    function ProductUpdate($id, Request $req)
    {
        $singleproduct = Product::find($id);

        $singleproduct->name = $req->input('name');
        $singleproduct->price = $req->input('price');
        $singleproduct->description = $req->input('description');

        if ($req->file("file")) {
            $singleproduct->file_name = $req->file("file")->store("products");
        }
        $singleproduct->save();
        return $singleproduct;
    }


    function Search($key)
    {

        return Product::where('name', 'Like', "%$key%")->get();
    }
}