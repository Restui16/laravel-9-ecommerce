@extends('layouts/app')

@section('content')
<div class="container text-start">
    <div class="row col">
        <div class="card">
            <div class="card-header">{{__('Product')}}</div>
            @foreach ($products as $product)
                <div class="card m-auto mt-5 mb-5" style="width: 18rem;">
                    <img src="{{ url('storage/'. $product->image) }}" class="card-img-top p-2" alt="Kipas" height="150px">
                    <div class="card-body">
                        <p class="card-text">{{ $product->name }}</p>
                        <form action="{{route('show_product', $product)}}" method="get" class="mb-1">
                            @csrf
                            <button type="submit" class="btn btn-info">Show Detail</button>
                        </form>
                        @if(Auth::check() && Auth::user()->is_admin)
                            <form action="{{ route('delete_product', $product)}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete Product</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection