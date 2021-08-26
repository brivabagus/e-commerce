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

@section('content')

    <!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset("assets/images/bg-01.jpg") }}');">
		<h2 class="ltext-105 cl0 txt-center">
			Profile
		</h2>
	</section>

    
    <!-- Breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                {{ $user->profile->fullname }}
            </span>
        </div>
    </div>

    <div class="container m-t-50">
        <div class="row p-0 m-l-50 m-r-50">

            <div class="col-4">
                <img src="{{ asset('assets/images/profile.png') }}" class="rounded-circle m-t-35" style="width: 80%;" alt="">
            </div>
            
            <div class="col-6 m-l--5">

                <div class="title mb-2">
                    <h4>Personal Information:</h4>
                
                    <div class="d-flex justify-content-end m-t--32">
                        <form action="/profile" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger p-2" value="Delete user">
                        </form>
                    </div>
                </div>

                <br>

                <div class="form  p-l-5">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="nama">Full name</label>
                                    <div class="card">
                                        <div class="card-body">
                                            {{ $user->profile->fullname }}
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="age">Age</label>
                                    <div class="card">
                                        <div class="card-body">
                                            {{ $user->profile->age }}
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
    
                    
    
                    <div class="form-group">
                        <label for="address">Address</label>
                            <div class="card">
                                <div class="card-body ">
                                    {{ $user->profile->address }}
                                </div>
                            </div>
                    </div>
    
                    <div class="form-group">
                        <label for="username">Username</label>
                            <div class="card">
                                <div class="card-body ">
                                    {{ $user->username }}
                                </div>
                            </div>
                    </div>
    
                    <div class="form-group">
                        <label for="email">Email</label>
                            <div class="card">
                                <div class="card-body">
                                    {{ $user->email }}
                                </div>
                            </div>
                    </div>
    
                    <div class="form-group d-flex justify-content-end m-t-25">
                        <a href="/"><button type="button" class="btn btn-secondary">Back to Home</button></a>
                        <a href="/profile/edit"><button type="button" class="btn btn-primary ml-2">Edit Profile</button></a>
                    </div>
                </div>

            </div>
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