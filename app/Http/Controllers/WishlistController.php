<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use App\User;
use App\Wishlist;
use App\Item;

class WishlistController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only('showWishlist', 'updateWishlist');
    }

    public function showWishlist(){
        $items = Auth::user()->wishlist()->get();

        return view('pages.wishlist_page.wishlist', compact('items'));
    }

    public function updateWishlist($id){
        $user = User::find(Auth::id());
        
        $hasTask = $user->wishlist()->where('item_id', $id)->exists();
        
        $nama_item = Item::where('id', $id)->first();

        if(!$hasTask){
            $user->wishlist()->attach($id);

            return redirect()->back()->with('success', "$nama_item->name telah ditambahkan ke dalam wishlist!");
        } else {
            Auth::user()->wishlist()->detach($id);

            return redirect()->back()->with('success', "$nama_item->name telah dihapus dari wishlist!");
        }
    }
}