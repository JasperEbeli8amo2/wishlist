@extends('layouts.app')
@section('content')

{{-- ID 1 is admin in dit geval omdat het het 1e account is die wordt aangemaakt. En er niet naar meerdere accounts wordt gevraagd.
Indien meerdere accounts admin zijn wordt dit als extra in DB toegevoegd en met een check van if(Auth::users->admin == true) --}}
    @if (Auth::id() == $wishlist->user_id || Auth::id() == "1")

    <div class="row">
        <div class="col dark-color-4">
            <h2 style="margin-top: 12px;" class="text-center">Edit Product</a></h2>
        </div>
    </div>

    <form action="{{ route('wishlists.update', $wishlist->id) }}" method="POST" enctype="multipart/form-data" name="update_product">
        {{ csrf_field() }}
        @method('PATCH')
        <div class="">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="name" placeholder="Name" class="form-control dark-color-3" />
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" id="image" class="form-control dark-color-3 p-1">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" id="description" placeholder="Description" class="form-control dark-color-3" />
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" id="price" placeholder="Price" class="form-control dark-color-3" />
            </div>
            <div class="form-group">
                <label>Link to Product</label>
                <input type="text" name="product_link" id="product_link" placeholder="Link to product" class="form-control dark-color-3" />
            </div>
            <div class="form-group">
                <button class="btn btn-dark btn-lg float-right" type="submit">Submit</button>
            </div>
        </div>
    </form>
    @endif
@endsection
