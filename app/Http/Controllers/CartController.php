<?php

namespace App\Http\Controllers;

use App\Cart;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PHPUnit\Framework\Constraint\Count;

class CartController extends Controller
{
    public function index(){
        $products = product::all();
        return view('index',compact('products'));
    }

    public function AddCart(Request $request,$id){
        $product = product::find($id);
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->AddCart($product,$id);

        $request->session()->put('Cart',$newCart);

        return view('cart');
    }

    public function DeleteItemCart(Request $request,$id){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);

        if(Count($newCart->products) > 0){
            $request->session()->put('Cart',$newCart);
        }else{
            $request->session()->forget('Cart');
        }

        return view('cart');
    }


    public function listCart(){
        return view('list-info');
    }

    public function DeleteItemListCart(Request $request,$id){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);

        if(Count($newCart->products) > 0){
            $request->session()->put('Cart',$newCart);
        }else{
            $request->session()->forget('Cart');
        }

        return view('list-cart');
    }

    public function SaveItemListCart(Request $request,$id,$quantity){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->UpdateItemCart($id,$quantity);

        $request->Session()->put('Cart',$newCart);

        return view('list-cart');
    }
}
