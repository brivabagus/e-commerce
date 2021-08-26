<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
use App\Item;

class ShopController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->only('create', 'store', 'destroy', 'edit', 'update', 'wishlist');
    }

    //
    public function shopAll(){
        $items = Item::all();

        return view('pages.shop_page.shop', compact('items'));
    }

    public function shopSearch(Request $request){
        $keyword = $request['keyword'];

        $items = Item::where(strtolower('name'), 'like', strtolower("%$keyword%"))->get();

        return view('pages.shop_page.shop', compact('items'));
    }

    public function shopByGender($gender){
        $items = Item::where('gender', $gender)->get();

        return view('pages.shop_page.shop', compact('items'));
    }

    public function shopByType($type){
        $items = Item::where('type', $type)->get();

        return view('pages.shop_page.shop', compact('items'));
    }

    public function detail($id){
        $item = Item::where('id', $id)->first();

        return view('pages.shop_page.detail', compact('item'));
    }

    public function create(){
        return view('pages.shop_page.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'gender' => 'required',
            'type' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:5120'
        ]);

    
        $image = $request->image;
        $new_image = time() . " - " . $image->getClientOriginalName();
    
        $item = Item::create([
            "name" => $request["name"],
            "price" => $request["price"],
            "gender" => $request["gender"],
            "type" => $request["type"],
            "description" => $request["description"],
            "image" => $new_image
        ]);
    
        $image->move('uploads/items/', $new_image);
    
        return redirect('/shop')->with('success', 'Item berhasil ditambahkan!');
    }

    public function destroy($id){
        $item = Item::where('id', $id)->delete();

        return redirect('/shop')->with('success', 'Item berhasil dihapus!');
    }

    public function edit($id){
        $item = Item::where('id', $id)->first();

        return view('pages.shop_page.edit', compact('item'));
    }

    public function update($id, Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'gender' => 'required',
            'type' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png|max:5120'
        ]);

        $item = Item::where('id', $id)->first();

        if($request->has('image')){
            File::delete("uploads/items/$item->image");
            $image = $request->image;
            $new_image = time() . " - " . $image->getClientOriginalName(); 
            $image->move('uploads/items', $new_image);
            $item = Item::where('id', $id)
                        ->update([
                            "name" => $request["name"],
                            "price" => $request["price"],
                            "gender" => $request["gender"],
                            "type" => $request["type"],
                            "description" => $request["description"],
                            "image" => $new_image
                        ]);
        } else {
            $item = Item::where('id', $id)
                        ->update([
                            "name" => $request["name"],
                            "price" => $request["price"],
                            "gender" => $request["gender"],
                            "type" => $request["type"],
                            "description" => $request["description"]
                        ]);
        }
 
        return redirect("/shop/$id")->with('success', 'Item berhasil diupdate!');
    }
}
