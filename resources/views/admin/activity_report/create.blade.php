@extends('template.base_admin')

@section('title')
<title>{{ env('APP_NAME') }} | Activity Report</title>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h6>Add New Activity Report</h6>
        <hr>
        <form action="{{ route('activity.report.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    

                    <div class="form-group">
                        <label for="date_of_activity">Date of Activity</label>
                        <input type="date" name="date_of_activity" class="form-control">
                        @error('date_of_activity')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="organization_name">organization_name</label>
                        <input type="text" name="organization_name" class="form-control">
                        @error('organization_name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="information">information</label>
                        <input type="text" name="information" class="form-control">
                        @error('information')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
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
                        <label for="documentation">documentation</label>
                        <br>
                        <img id="img-preview" width="200px" class="img-thumbnail mb-2" alt="">

                        <input type="file" class="form-control" id="form-file" name="documentation">
                        @error('documentation')
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
