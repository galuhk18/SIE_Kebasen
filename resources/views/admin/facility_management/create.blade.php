@extends('template.base_admin')

@section('title')
<title>{{ env('APP_NAME') }} | Facility Management</title>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h6>Add New Facility Management</h6>
        <hr>
        <form action="{{ route('facility.management.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    

                    <div class="form-group">
                        <label for="facility_code">facility_code</label>
                        <input type="text" name="facility_code" class="form-control">
                        @error('facility_code')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="facility_name">facility_name</label>
                        <input type="text" name="facility_name" class="form-control">
                        @error('facility_name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="stock">stock</label>
                        <input type="number" name="stock" class="form-control">
                        @error('stock')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6">

                    
                    <div class="form-group">
                        <label for="condition">condition</label>
                        <input type="text" name="condition" class="form-control">
                        @error('condition')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="picture">picture</label>
                        <br>
                        <img id="img-preview" width="200px" class="img-thumbnail mb-2" alt="">

                        <input type="file" class="form-control" id="form-file" name="picture">
                        @error('picture')
                            <div class="text-danger">{{ $message }}</div>
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
