<header class="header-v2">

    <!-- Header desktop -->
    <div class="container-menu-desktop trans-03">
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop p-l-45">
                
                <!-- Logo desktop -->		
                <a href="/" class="logo">
                    <img src="{{ asset('assets/images/icons/logo-01.png') }}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        @yield('header-link')
                    </ul>
                </div>	

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m h-full">
                    <div class="flex-c-m h-full p-r-24">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
                            <button onclick="focusInput()"><i class="zmdi zmdi-search"></i></button>
                        </div>
                    </div>
                        
                    <div class="flex-c-m h-full p-l-18 p-r-25">
                        @auth
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti" data-notify="{{ Auth::user()->orders()->sum('quantity') }}">
                                <a href="/cart" style="color: black"><i class="zmdi zmdi-shopping-cart"></i></a>
                            </div>
                        @endauth
                        @guest
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti" data-notify="0">
                                <a href="/cart" style="color: black"><i class="zmdi zmdi-shopping-cart"></i></a>
                            </div>
                        @endguest

                        
                    </div>
                        
                    <div class="flex-c-m h-full p-lr-19">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                            <i class="zmdi zmdi-menu"></i>
                        </div>
                    </div>
                </div>
            </nav>
        </div>	
    </div>
    
    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="{{ asset('assets/images/icons/icon-close2.png') }}" alt="CLOSE">
            </button>

            <form action="/shop/search" class="wrap-search-header flex-w p-l-15" id="searchItem">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input id="keyword" class="plh3" type="text" name="keyword" placeholder="Search..." autofocus>
            </form>
        </div>
    </div>

    <script>
        function focusInput() {
            document.getElementById("keyword").focus();
        }
    </script>

</header>