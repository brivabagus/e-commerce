<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class PdfController extends Controller
{
    //
    public function printReceipt(){
        $items = Auth::user()->orders()->get();

        $total = 0;
        foreach ($items as $item) {
            $total = $total + ($item->price * Auth::user()->orders()->where('item_id',$item->id)->first()->pivot->quantity);
        }

        $pdf = PDF::loadView('pdf', compact('items', 'total'));

        return $pdf->stream();
    }
}
