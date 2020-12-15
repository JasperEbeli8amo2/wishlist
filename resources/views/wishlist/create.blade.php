@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col dark-color-4">
            <h2 style="margin-top: 12px;" class="text-center">Add Wish</a></h2>

            <form action="{{ route('wishlists.store') }}" method="POST" enctype="multipart/form-data" class="disabled-textbox-form">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name" placeholder="Name" class="form-control dark-color-3" />
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control dark-color-3 p-1">
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

                <input type="hidden" id="formHiddenCover" name="coverUrl" value="">

                <div class="form-group">
                    <button class="btn btn-dark btn-lg float-right" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection
