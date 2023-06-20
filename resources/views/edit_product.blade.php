@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card m-auto" style="width: 75%">
        <div class="card-header">{{__('Update   Product')}}</div>

        <div class="card-body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger" role="alert">{{ $error }}</p>
                @endforeach
            @endif  
            <form action="{{ route('update_product', $product) }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="price" id="price" value="{{ $product->price }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="stock" id="stock" value="{{ $product->stock }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea name="description"  class="form-control" id="desctiption" cols="30" rows="3">{{ $product->description }}</textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>    

    
@endsection