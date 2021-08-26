<section class="sec-product bg0 p-t-50">
    <div class="container">
        <div class="p-b-32">
            <h3 class="ltext-105 cl5 txt-center respon1">
                Store Overview
            </h3>
        </div>

        <!-- Tab01 -->
        <div class="tab01">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item p-b-10">
                    <a class="nav-link active" data-toggle="tab" href="#best-seller" role="tab">New Arrivals</a>
                </li>

                <li class="nav-item p-b-10">
                    <a class="nav-link" data-toggle="tab" href="#featured" role="tab">Best Price</a>
                </li>

                <li class="nav-item p-b-10">
                    <a class="nav-link" data-toggle="tab" href="#sale" role="tab">Just For You</a>
                </li>

                <li class="nav-item p-b-10">
                    <a class="nav-link" data-toggle="tab" href="#top-rate" role="tab">Premium Quality</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-t-50">
                <!-- NEW ARRIVAL -->
                <div class="tab-pane fade show active" id="best-seller" role="tabpanel">
                    <!-- Slide2 -->
                    <div class="wrap-slick2">
                        <div class="slick2">

                            @if ($newArrivals->isEmpty())
                                <div class="text-center">
                                    <h3 class="m-t-25 m-b-40">No Results</h3>
                                </div>
                            @else
                                @foreach ($newArrivals as $item)
                                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                        <!-- Block2 -->
                                        <div class="block2">
                                            <div class="block2-pic hov-img0">
                                                <img src="{{ asset("uploads/items/$item->image") }}" alt="IMG-PRODUCT">

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
                                                        @auth
                                                            @if (Auth::user()->wishlist->contains($item->id) )
                                                                <img class="icon-heart1 dis-block trans-04" src="{{ asset('assets/images/icons/icon-heart-02.png') }}" alt="ICON">
                                                            @else
                                                                <img class="icon-heart1 dis-block trans-04" src="{{ asset('assets/images/icons/icon-heart-01.png') }}" alt="ICON">
                                                            @endif
                                                        @endauth

                                                        @guest
                                                            <img class="icon-heart1 dis-block trans-04" src="{{ asset('assets/images/icons/icon-heart-01.png') }}" alt="ICON">
                                                        @endguest
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <!-- BEST PRICE -->
                <div class="tab-pane fade" id="featured" role="tabpanel">
                    <!-- Slide2 -->
                    <div class="wrap-slick2">
                        <div class="slick2">
                            @if ($bestPrice->isEmpty())
                                <div class="text-center">
                                    <h3 class="m-t-25 m-b-40">No Results</h3>
                                </div>
                            @else
                                @foreach ($bestPrice as $item)
                                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                        <!-- Block2 -->
                                        <div class="block2">
                                            <div class="block2-pic hov-img0">
                                                <img src="{{ asset("uploads/items/$item->image") }}" alt="IMG-PRODUCT">

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
                                                        @auth
                                                            @if (Auth::user()->wishlist->contains($item->id) )
                                                                <img class="icon-heart1 dis-block trans-04" src="{{ asset('assets/images/icons/icon-heart-02.png') }}" alt="ICON">
                                                            @else
                                                                <img class="icon-heart1 dis-block trans-04" src="{{ asset('assets/images/icons/icon-heart-01.png') }}" alt="ICON">
                                                            @endif
                                                        @endauth

                                                        @guest
                                                            <img class="icon-heart1 dis-block trans-04" src="{{ asset('assets/images/icons/icon-heart-01.png') }}" alt="ICON">
                                                        @endguest
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <!-- JUST FOR YOU -->
                <div class="tab-pane fade" id="sale" role="tabpanel">
                    <!-- Slide2 -->
                    <div class="wrap-slick2">
                        <div class="slick2">
                            @if ($justForYou->isEmpty())
                                <div class="text-center">
                                    <h3 class="m-t-25 m-b-40">No Results</h3>
                                </div>
                            @else
                                @foreach ($justForYou as $item)
                                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                        <!-- Block2 -->
                                        <div class="block2">
                                            <div class="block2-pic hov-img0">
                                                <img src="{{ asset("uploads/items/$item->image") }}" alt="IMG-PRODUCT">

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
                                                        @auth
                                                            @if (Auth::user()->wishlist->contains($item->id) )
                                                                <img class="icon-heart1 dis-block trans-04" src="{{ asset('assets/images/icons/icon-heart-02.png') }}" alt="ICON">
                                                            @else
                                                                <img class="icon-heart1 dis-block trans-04" src="{{ asset('assets/images/icons/icon-heart-01.png') }}" alt="ICON">
                                                            @endif
                                                        @endauth

                                                        @guest
                                                            <img class="icon-heart1 dis-block trans-04" src="{{ asset('assets/images/icons/icon-heart-01.png') }}" alt="ICON">
                                                        @endguest
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <!-- PREMIUM QUALITY -->
                <div class="tab-pane fade" id="top-rate" role="tabpanel">
                    <!-- Slide2 -->
                    <div class="wrap-slick2">
                        <div class="slick2">
                            @if ($premiumQuality->isEmpty())
                                <div class="text-center">
                                    <h3 class="m-t-25 m-b-40">No Results</h3>
                                </div>
                            @else
                                @foreach ($premiumQuality as $item)
                                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                        <!-- Block2 -->
                                        <div class="block2">
                                            <div class="block2-pic hov-img0">
                                                <img src="{{ asset("uploads/items/$item->image") }}" alt="IMG-PRODUCT">

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
                                                        @auth
                                                            @if (Auth::user()->wishlist->contains($item->id) )
                                                                <img class="icon-heart1 dis-block trans-04" src="{{ asset('assets/images/icons/icon-heart-02.png') }}" alt="ICON">
                                                            @else
                                                                <img class="icon-heart1 dis-block trans-04" src="{{ asset('assets/images/icons/icon-heart-01.png') }}" alt="ICON">
                                                            @endif
                                                        @endauth

                                                        @guest
                                                            <img class="icon-heart1 dis-block trans-04" src="{{ asset('assets/images/icons/icon-heart-01.png') }}" alt="ICON">
                                                        @endguest
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>