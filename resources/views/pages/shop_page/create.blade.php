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
			Create
		</h2>
	</section>

    <!-- Breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-15 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Shop
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </span>

            <span class="stext-109 cl4">
                Create
            </span>
        </div>
    </div>

    <div class="container m-t-59 d-flex justify-content-center">
        <div class="card w-50 ">
            <div class="card-header bg-secondary">
                <p class="text-white">Form to Create Item</p>
                
            </div>
            <div class="card-body">
                <form action="/shop" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name Item</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Item name">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="price">Price</label>
                            <input type="number" step="any" class="form-control" id="price" name="price" placeholder="Price">
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-3">
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender" class="form-control">
                                <option selected>Men</option>
                                <option>Women</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="type">Type</label>
                            <select id="type" name="type" class="form-control">
                                <option selected>Clothes</option>
                                <option>Watches</option>
                                <option>Bags</option>
                                <option>Accessories</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="description">Description</label> <br>
                        <textarea class="border border-secondary p-2" name="description" id="description" placeholder="Description" 
                        rows="10" cols="50"></textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-2 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>


@endsection