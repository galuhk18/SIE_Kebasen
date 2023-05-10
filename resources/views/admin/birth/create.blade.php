@extends('template.base_admin')

@section('title')
<title>{{ env('APP_NAME') }} | User Admin</title>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h6>Add New Birth</h6>
        <hr>
        <form action="{{ route('birth.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6">

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" class="form-control">
                        @error('nik')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                   

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
                        <label for="gender" class="d-block">Gender</label>
                        @foreach($gender as $ge)

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline{{ $ge }}" name="gender"
                                    class="custom-control-input" value="{{ $ge }}">
                                <label class="custom-control-label"
                                    for="customRadioInline{{ $ge }}">{{ Str::ucfirst($ge) }}</label>
                            </div>
                        @endforeach
                        @error('gender')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control"></textarea>
                        @error('address')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                   

                    


                </div>

                <div class="col-lg-6">
                    
                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control">
                        @error('date_of_birth')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="father_name">Father Name</label>
                        <input type="text" name="father_name" class="form-control">
                        @error('father_name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mother_name">Mother Name</label>
                        <input type="text" name="mother_name" class="form-control">
                        @error('mother_name')
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
