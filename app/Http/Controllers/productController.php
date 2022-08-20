<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class productController extends Controller
{
    //
    function insert(Request $req){
        $name = $req->get('name');
        $image = $req->file('image')->getClientOriginalName();
        $price = $req->get('price');
        $status = $req->get('status');

        //Move file 
        $req->image->move(public_path('images'), $image);

        $prod = new product();
        $prod->name = $name;
        $prod->image = $image;
        $prod->price = $price;
        $prod->status = $status;
        $prod->save();
        return redirect('product');
    }

    function readdata(){
        $pdata = product::all();
        return view('insertRead', ['data'=>$pdata]);
    }

    function updateordelete(Request $req){
        $id = $req->get('id');
        $name = $req->get('name');
        $price = $req->get('price');
        $status = $req->get('status');

        if($req->get('update') == 'Update'){
            return view('updateview',['id'=>$id, 'name'=>$name, 'price'=>$price, 'status'=>$status]);
        } else {
            $prod = product::find($id);
            $prod->delete();
        }
        return redirect('product');
    }

    function update(Request $req){
        $ID = $req->get('id');
        $name = $req->get('name');
        $price = $req->get('price');
        $status = $req->get('status');

        $prod = product::find($ID);
        $prod->name = $name;
        $prod->price = $price;
        $prod->status = $status;
        $prod->save();
        return redirect('product');
    }
}