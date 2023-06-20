@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card m-auto" style="width: 75%">
        <div class="card-header">{{__('Profile')}}</div>

        <div class="card-body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger" role="alert">{{ $error }}</p>
                @endforeach
            @endif  
            <form action="{{ route('edit_profile')}}" method="post">
                @csrf
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="Email" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$user->is_admin ? 'admin' : 'Member'}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Change Profile Details</button>
            </form>
        </div>
    </div>
</div>    

    
@endsection