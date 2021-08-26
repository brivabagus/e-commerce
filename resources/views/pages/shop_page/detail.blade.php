@extends('master')

@section('header-link')
    <li>
        <a href="/">Home</a>
    </li>

    <li class="active-menu">
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

            <a href="/shop" class="stext-109 cl8 hov-cl1 trans-04">
                Shop
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                {{ $item->name }}
            </span>
        </div>

        <div class="d-flex justify-content-end m-t--32">
            <a href="/shop/{{ $item->id }}/edit" class="btn btn-secondary p-2 mr-2">Edit item</a>
            <form action="/shop/{{ $item->id }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger p-2 mr-2" value="Delete item">
            </form>
        </div>
    </div>
@endsection

@section('content')

    <section class="sec-product-detail bg0 p-t-65 m-b-40">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                <div class="item-slick3" data-thumb='{{ asset("uploads/items/$item->image") }}'>
                                    <div class="wrap-pic-w pos-relative">
                                        <img src='{{ asset("uploads/items/$item->image") }}' alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href='{{ asset("uploads/items/$item->image") }}'>
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $item->name }}
                        </h4>

                        <span class="mtext-106 cl2">
                            ${{ $item->price }}
                        </span>

                        <p class="stext-102 cl3 p-t-23">
                            Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
                        </p>
                        
                        <!--  -->
                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-203 flex-c-m respon6">
                                    Size
                                </div>

                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="js-select2" name="time">
                                            <option>Choose an option</option>
                                            <option>Size S</option>
                                            <option>Size M</option>
                                            <option>Size L</option>
                                            <option>Size XL</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-203 flex-c-m respon6">
                                    Color
                                </div>

                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="js-select2" name="time">
                                            <option>Choose an option</option>
                                            <option>Red</option>
                                            <option>Blue</option>
                                            <option>White</option>
                                            <option>Grey</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">

                                    <form action="/cart/{{ $item->id }}" method="POST">
                                        @csrf
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>
    
                                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" min="1" value="1">
    
                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
    
                                        <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 mt-3 trans-04" type="submit">
                                            Add to cart
                                        </button>
                                    </form>

                                    
                                </div>
                            </div>	
                        </div>
                    </div>
                </div>
            </div>

            <div class="bor10 m-t-50 p-t-43">
                <!-- Tab01 -->
                    <h2 class="d-flex justify-content-center">Description</h2> <br>

                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
                                {{ $item->description }}
                            </p>
                        </div>
                    </div>

                    <div class="bg6 flex-c-m flex-w size-302 m-t-30 p-tb-15">
                        <span class="stext-107 cl6 p-lr-25">
                            Categories: {{ $item->type }}, {{ $item->gender }}
                        </span>
                    </div>
            </div>
        </div>
    </section>

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