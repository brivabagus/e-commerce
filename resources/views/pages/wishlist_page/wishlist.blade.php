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
                Wishlist
            </span>
        </div>
    </div>
    
@endsection

@section('content')
    
    <div class="bg0 m-t-30 p-b-140 m-l-50 m-r-50">
        <div class="container">
            @if ($items->isEmpty())
                <div class="text-center">
                    <h3 class="m-t-100">No Results</h3>
                </div>
            @else
            <div class="row isotope-grid" id="areanya">
                @foreach ($items as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                        <!-- Block2 -->
                        <div class="block2 animated-block">
                            <div class="block2-pic hov-img0">
                                <img src='{{ asset("uploads/items/$item->image") }}' alt="IMG-PRODUCT">
            
                                <a href="/shop/{{ $item->id }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                    Quick View
                                </a>
                            </div>
            
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="/shop/{{ $item->id }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $item->name }}
                                    </a>
            
                                    <span class="stext-105 cl3">
                                        ${{ $item->price }}
                                    </span>
                                </div>
            
                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="/wishlist/{{ $item->id }}" class="btn-addwish-b2 dis-block pos-relative">
                                        @if (Auth::user()->wishlist->contains($item->id))
                                            <img class="icon-heart1 dis-block trans-04" src="{{ asset('assets/images/icons/icon-heart-02.png') }}" alt="ICON">
                                        @else
                                            <img class="icon-heart1 dis-block trans-04" src="{{ asset('assets/images/icons/icon-heart-01.png') }}" alt="ICON">
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>

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