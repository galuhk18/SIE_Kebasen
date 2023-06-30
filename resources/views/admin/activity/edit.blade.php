@extends('template.base_admin')

@section('title')
<title>{{ env('APP_NAME') }} | User Admin</title>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h6>Edit Activity</h6>
        <hr>
        <form action="{{ route('activity.update', ['id' => $activity->id]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Activity Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $activity->name }}">
                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date_of_activity">Date of Activity</label>
                        <input type="date" name="date_of_activity" class="form-control" value="{{ $activity->date_of_activity }}">
                        @error('date_of_activity')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                </div>

                <div class="col-lg-6">

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control">{{ $activity->address }}</textarea>
                        @error('address')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="information">Information</label>
                        <textarea name="information" class="form-control">{{ $activity->information }}</textarea>
                        @error('information')
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
