@extends('template.base_admin')

@section('title')
<title>{{ env('APP_NAME') }} | User Executive</title>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h6>Add New Executive</h6>
        <hr>
        <form action="{{ route('user.executive.store') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control">
                        @error('username')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>




                    <div class="form-group">
                        <label for="picture">Picture</label>
                        <br>
                        <img id="img-preview" width="200px" class="img-thumbnail mb-2" alt="">

                        <input type="file" class="form-control" id="form-file" name="picture">
                        @error('picture')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="tel" name="phone_number" class="form-control">
                        @error('phone_number')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirm">Password Confirm</label>
                        <input type="password" name="password_confirm" class="form-control">
                        @error('password_confirm')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" cols="30" rows="5"></textarea>
                        @error('address')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">

                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
