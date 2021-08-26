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
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </span>

            <span class="stext-109 cl4">
                Edit
            </span>
        </div>
    </div>

    <div class="container m-t-50">
        <div class="row p-0 m-l-50 m-r-50">

            <div class="col-4">
                <img src="{{ asset('assets/images/profile.png') }}" class="rounded-circle m-t-35" style="width: 80%;" alt="">
            </div>
            
            <div class="col-6 m-l--5">
                <h4>Edit Personal Information:</h4> <br>

                <form action="/profile" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-row p-l-10">
                        <div class="form-group col-md-8">
                            <label for="fullname">Full name</label>
                            <input type="text" class="form-control" name="fullname" id="fullname" value="{{ old('fullname', $user->profile->fullname ) }}"
                            placeholder="Masukkan nama lengkap Anda">
                            @error('fullname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="age">Age</label>
                            <input type="number" step="1" class="form-control" id="age" name="age" value="{{ old('age', $user->profile->age) }}"
                            placeholder="Age">
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group p-l-10">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{ old('address', $user->profile->address) }}"
                        placeholder="Masukkan address Anda">
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="form-group p-l-10">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" value="{{ old('username', $user->username) }}"
                        placeholder="Masukkan username Anda">
                        @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="form-group p-l-10">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}"
                        placeholder="Masukkan email Anda">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="form-group p-l-10">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password Anda">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="form-group d-flex justify-content-end m-t-20">
                        <a href="/"><button type="button" class="btn btn-danger">Cancel</button></a>
                        <button type="submit" class="btn btn-primary ml-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

