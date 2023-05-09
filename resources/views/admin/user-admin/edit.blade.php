@extends('template.base_admin')

@section('title')
<title>{{ env('APP_NAME') }} | User Admin</title>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h6>Edit Admin</h6>
        <hr>
        <form action="{{ route('user.admin.update',['id' => $admin->id]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $admin->name }}">
                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ $admin->username }}">
                        @error('username')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $admin->email }}">
                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    

                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="tel" name="phone_number" class="form-control" value="{{ $admin->phone_number }}">
                        @error('phone_number')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" cols="30" rows="5">{{ $admin->address }}</textarea>
                        @error('address')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                
                <button type="submit" class="btn btn-info btn-lg">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
