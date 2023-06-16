@extends('template.base_admin')

@section('title')
<title>{{ env('APP_NAME') }} | Building Management</title>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h6>Add New Building Management</h6>
        <hr>
        <form action="{{ route('building.management.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    

                    <div class="form-group">
                        <label for="building_code">building_code</label>
                        <input type="text" name="building_code" class="form-control">
                        @error('building_code')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="building_name">building_name</label>
                        <input type="text" name="building_name" class="form-control">
                        @error('building_name')
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
