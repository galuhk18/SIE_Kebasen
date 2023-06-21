@extends('template.base_admin')

@section('title')
<title>{{ env('APP_NAME') }} | Facility Compensation</title>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h6>Add New Facility Compensation</h6>
        <hr>
        <form action="{{ route('facility.compensation.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    

                    

                    <div class="form-group">
                        <label for="facility_name">Facility Name</label>
                        <input type="text" name="facility_name" class="form-control">
                        @error('facility_name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="amount">amount</label>
                        <input type="number" name="amount" class="form-control">
                        @error('amount')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="amount_compensation">amount_compensation</label>
                        <input type="number" name="amount_compensation" class="form-control">
                        @error('amount_compensation')
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

                <div class="col-lg-6">

                    
                    
                    <div class="form-group">
                        <label for="person_responsible">person_responsible</label>
                        <input type="text" name="person_responsible" class="form-control">
                        @error('person_responsible')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="telp">telp</label>
                        <input type="tel" name="telp" class="form-control">
                        @error('telp')
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

