@extends('template.base')
@section('title')
<title>{{ env('APP_NAME') }} | Admin Login</title>    
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-danger">
                                
                                <div class="text-white d-flex align-items-center justify-content-center" style="height: 500px;">
                                    <i class="fa fa-building" style="font-size: 50px;"></i>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center mb-5">
                                        <h1 class="h4 text-gray-900">{{ env('APP_NAME') }} | Login</h1>
                                    </div>
                                    <hr>
                                    <form class="user" action="{{ route('auth.admin.login.validation') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                            @error('email')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                            @error('password')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                        <button type="submit" class="btn btn-danger btn-user btn-block">
                                            Login
                                        </button>
                                       
                                        
                                    </form>
                                    <hr>
                                  
                                    <div class="text-center">
                                        <p class="small" ><i class="fa fa-copyright"></i> {{ env('APP_NAME').' '.date('Y') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection