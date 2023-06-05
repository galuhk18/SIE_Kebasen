@extends('template.base_admin')

@section('title')
<title>{{ env('APP_NAME') }} | Decision</title>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h6>Add New Decision</h6>
        <hr>
        <form action="{{ route('decision.store') }}" method="post"
            enctype="multipart/form-data">
            
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="decision">decision</label>
                        <input type="text" name="decision" class="form-control">
                        @error('decision')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="type_of_decision">type_of_decision</label>
                        <input type="text" name="type_of_decision" class="form-control">
                        @error('type_of_decision')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="decision_date">decision_date</label>
                        <input type="date" name="decision_date" class="form-control">
                        @error('decision_date')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="problem">problem</label>
                        <textarea name="problem" class="form-control"></textarea>
                        @error('problem')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    
                </div>
                <div class="col-lg-6">


                    

                    <div class="form-group">
                        <label for="documentasion">documentasion</label>
                        <br>
                        <img id="img-preview" width="200px" class="img-thumbnail mb-2" alt="">

                        <input type="file" class="form-control" id="form-file" name="documentasion">
                        @error('documentasion')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="realization_date">realization_date</label>
                        <input type="date" name="realization_date" class="form-control">
                        @error('realization_date')
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