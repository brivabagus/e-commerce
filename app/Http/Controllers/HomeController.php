<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function overview()
    {
        $newArrivals = DB::table('items')->orderBy('created_at', 'desc')->paginate(8);
        $bestPrice = DB::table('items')->orderBy('price', 'asc')->paginate(8);
        $justForYou = DB::table('items')->inRandomOrder()->paginate(8);
        $premiumQuality = DB::table('items')->orderBy('price', 'desc')->paginate(8);

        return view('pages.homepage.home', compact('newArrivals', 'bestPrice', 'justForYou', 'premiumQuality'));
    }
}