@extends('master')

@section('header-link')
    <li class="active-menu">
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

@section('content')

    <!-- Slider -->
        @include('partial.slider')
    <!-- /Slider -->

    <!-- Sidebar -->
        @include('partial.sidebar')
    <!-- /Sidebar -->

    <!-- Banner -->
        @include('pages.homepage.banner')
    <!-- /Banner -->

    <!-- Product / Store Overview -->
        @include('pages.homepage.product')
    <!-- /Product / Store Overview -->

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