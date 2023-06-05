@extends('template.base_admin')

@section('title')
<title>{{ env('APP_NAME') }} | Funding Petition</title>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h6>Add New Funding Petition</h6>
        <hr>
        <form action="{{ route('funding.petition.store') }}" method="post" enctype="multipart/form-data">
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
                        <label for="budget_amount">budget_amount</label>
                        <input type="number" name="budget_amount" class="form-control">
                        @error('budget_amount')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="event_name">event_name</label>
                        <input type="text" name="event_name" class="form-control">
                        @error('event_name')
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
                        <label for="proposal">proposal</label>
                        <input type="file" name="proposal" class="form-control">
                        <small>*) Format .pdf</small>
                        @error('proposal')
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
