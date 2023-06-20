@extends('layouts/app')

@section('content')


<div class="container">
    <div class="card m-auto" style="width: 45rem">
        <div class="card-header">
            <h1> Cart </h1>
        </div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif

        @php
           $total_price = 0 
        @endphp

        @foreach ($carts as $cart)
            <div class="card-body">
                <div class="row">
                    <div class="col-auto">
                        <img src="{{ url('storage/' . $cart->product->image) }}" alt="" height="130px">
                    </div>
                    <div class="col-auto">
                        <h1>{{ $cart->product->name }}</h1>
                        <form class="row mb-2" action="{{ route('update_cart', $cart) }}" method="post">
                            @method('patch')
                            @csrf
                            <div class="col-auto">
                                <input type="number" class="form-control" name="amount" value={{ $cart->amount }}>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-outline-primary">Update Amount</button>
                            </div>
                        </form>
                        <form action="{{ route('delete_cart', $cart) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
                <hr>
            </div>
            @php
                $total_price += $cart->product->price * $cart->amount
            @endphp
        @endforeach
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5
                    @if($total_price == 0) class="p-2 fw-bold invisible" @endif>Total : Rp. {{ $total_price }}
                </h5>
                <form action="{{ route('chekout')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success"
                        @if($carts->isEmpty()) disabled @endif>Chekout</button>
                </form>
            </div>
            
        </div>
        
    </div>
    
</div>
@endsection