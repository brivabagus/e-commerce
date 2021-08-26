@extends('master')

@section('header-link')
    <li>
        <a href="/">Home</a>
    </li>

    <li>
        <a href="/shop">Shop</a>
    </li>

    <li>
        <a href="/about">About</a>
    </li>

    <li>
        <a href="/contact">Contact</a>
    </li>
@endsection

@section('breadcrumb')
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Shopping Cart
            </span>
        </div>
        @if (!$items->isEmpty())
            <div class="d-flex justify-content-end m-t--29 m-r-40">
                <a href="/receipt"><button type="button" class="btn btn-primary">Print Receipt</button></a>
            </div>
        @endif
    </div>
@endsection

@section('content')

    <form class="bg0 p-t-40">
        <div class="container">

            @if ($items->isEmpty())
                <div class="text-center">
                    <h3 class="m-t-50">No Results</h3>
                </div>
            @else
                <div class="row">
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="wrap-table-shopping-cart">
                                <table class="table-shopping-cart">
                                    <tr class="table_head">
                                        <th class="column-1">Product</th>
                                        <th class="column-2"></th>
                                        <th class="column-3">Price</th>
                                        <th class="column-4 text-center">Quantity</th>
                                        <th class="column-5">Total</th>
                                    </tr>
                                    <div class="row isotope-grid" id="areanya">
                                        @foreach ($items as $item)
                                            <tr class="table_row">
                                                <td class="column-1">
                                                    <div class="how-itemcart1">
                                                        <img src='{{ asset("uploads/items/$item->image") }}' style="float: right;" alt="IMG">
                                                    </div>
                                                </td>

                                                <td class="column-2">{{ $item->name }}</td>
                                                <td class="column-3">${{ $item->price }}</td>
                                                <td class="column-4">
                                                    <div class="wrap-num-product flex-w m-tb-10">
                                                        <a href="/cart/remove/{{ $item->id }}">
                                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                                            </div>
                                                        </a>
                
                                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" min="1" value="{{ Auth::user()->orders()->where('item_id',$item->id)->first()->pivot->quantity }}">
                
                                                        <a href="/cart/{{ $item->id }}">
                                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="column-5">${{ $item->price * Auth::user()->orders()->where('item_id',$item->id)->first()->pivot->quantity }}</td>
                                            </tr>
                                        @endforeach
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                            <h4 class="mtext-109 cl2 p-b-30">
                                Cart Totals
                            </h4>

                            <div class="flex-w flex-t p-t-15 p-b-33">
                                <div class="size-208">
                                    <span class="mtext-101 cl2">
                                        Total:
                                    </span>
                                </div>

                                <div class="size-209 p-t-1">
                                    <span class="mtext-110 cl2">
                                        ${{ $total }}
                                    </span>
                                </div>
                            </div>

                            <a href="/checkout">
                                <button type="button" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04">
                                    Proceed to Checkout
                                </button>
                            </a>

                        </div>
                    </div>
                </div>
            @endif
        </div>
    </form>

@endsection

@push('scripts')

    @if (session('success'))
        <script>
            var delayInMilliseconds = 2000; // 2 second

            setTimeout(function() {
                // your code to be executed after 2 second
                Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "Cool",
            });
            }, delayInMilliseconds);
        </script>
    @endif

@endpush