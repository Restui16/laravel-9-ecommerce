@extends('layouts/app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Product_Detail')}}</div>

                <div class="card-body">
                    <div class="d-flex justify-content-around">
                        <div class="m-3">
                            <img src="{{ url('storage/'. $product->image) }}" alt="Product" width="200px">
                        </div>
                        <div class="">
                            <h1>{{ $product->name }}</h1>
                            <h6>{{ $product->description }}</h6>
                            <h3>Rp. {{ $product->price }}</h3>
                            <hr>
                            <p>{{ $product->stock }} left</p>
                            @if(!Auth::user()->is_admin)
                                <form class="" action="{{ route('add_to_cart', $product) }}" method="post">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" area-descibedby="basic-addon2" name="amount" value=1>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-outline-secondary pl-2">Add To Cart</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('edit_product', $product) }}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Update Product</button>
                                </form>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection