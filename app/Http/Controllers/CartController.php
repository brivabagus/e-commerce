<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\User;
use App\Item;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only('showOrder', 'updateOrder', 'deleteOrder');
    }

    public function showOrder(){
        $items = Auth::user()->orders()->get();

        $total = 0;
        foreach ($items as $item) {
            $total = $total + ($item->price * Auth::user()->orders()->where('item_id',$item->id)->first()->pivot->quantity);
        }

        return view('pages.cart_page.cart', compact('items', 'total'));
    }

    public function updateOrder($id, Request $request){
        $user = User::find(Auth::id());

        $hasTask = $user->orders()->where('item_id', $id)->exists();

        $nama_item = Item::where('id', $id)->first();

        if(!$hasTask){
            // ITEM BELUM ADA
            
            Auth::user()->orders()->attach($id, [
                'quantity' => $request['num-product']
            ]);

        } else {
            // UDAH ADA ITEMNYA (tambah quantitynya)

            $order = $user->orders()->where('item_id', $id)->increment('quantity',$request['num-product']);
        }

        return redirect()->back()->with('success', "$nama_item->name berhasil ditambahkan ke dalam keranjang!");
    }

    public function updateFromCart($id){
        $user = User::find(Auth::id());

        $nama_item = Item::where('id', $id)->first();

        $order = $user->orders()->where('item_id', $id)->increment('quantity', 1); 

        return redirect()->back()->with('success', "$nama_item->name berhasil ditambahkan ke dalam keranjang!");
    }

    public function removeOrder($id){
        $user = User::find(Auth::id());

        $sumQuantity = $user->orders()->where('item_id', $id)->first()->pivot->quantity;

        $nama_item = Item::where('id', $id)->first();

        if($sumQuantity == 1){
            $order = $user->orders()->where('item_id', $id)->detach();

            return redirect()->back()->with('success', "$nama_item->name telah dihapus dari keranjang!");
        } else {
            $order = $user->orders()->where('item_id', $id)->decrement('quantity',1);

            return redirect()->back()->with('success', "1 $nama_item->name telah dihapus dari keranjang!");
        }
    }

    public function clearOrder(){
        $user = User::find(Auth::id());

        $temp = $user->orders()->detach(Auth::id());

        return redirect('/')->with('success', "Berhasil membeli semua item di keranjang!");
    }
}
