@extends('template.base_admin')

@section('title')
<title>{{ env('APP_NAME') }} | User Admin</title>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h6>Edit Population</h6>
        <hr>
        <form action="{{ route('population.update', ['id' => $population->id]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-6">

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" class="form-control" value="{{ $population->nik }}">
                        @error('nik')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="family_card">Family Card / KK</label>
                        <input type="text" name="family_card" class="form-control" value="{{ $population->family_card }}">
                        @error('family_card')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $population->name }}">
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
                                    class="custom-control-input" value="{{ $ge }}" {{ ($ge == $population->gender) ? 'checked' : '' }}>
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
                        <textarea name="address" class="form-control">{{ $population->address }}</textarea>
                        @error('address')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control" value="{{ $population->date_of_birth }}">
                        @error('date_of_birth')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="birth_place">Birth Place</label>
                        <input type="text" name="birth_place" class="form-control" value="{{ $population->birth_place }}">
                        @error('birth_place')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="tel" name="phone_number" class="form-control" value="{{ $population->phone_number }}">
                        @error('phone_number')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="religion" class="d-block">Religion</label>
                        @foreach($religion as $re)

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline{{ $re }}" name="religion"
                                    class="custom-control-input" value="{{ $re }}" {{ ($re == $population->religion) ? 'checked' : '' }}>
                                <label class="custom-control-label"
                                    for="customRadioInline{{ $re }}">{{ Str::ucfirst($re) }}</label>
                            </div>
                        @endforeach
                        @error('religion')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="citizenship" class="d-block">Citizenship</label>
                        @foreach($citizenship as $ci)

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline{{ $ci }}" name="citizenship"
                                    class="custom-control-input" value="{{ $ci }}" {{ ($ci == $population->citizenship) ? 'checked' : '' }}>
                                <label class="custom-control-label"
                                    for="customRadioInline{{ $ci }}">{{ Str::upper($ci) }}</label>
                            </div>
                        @endforeach
                        @error('citizenship')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="married" class="d-block">Married</label>
                        @foreach($married as $ma)

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline{{ $ma }}" name="married"
                                    class="custom-control-input" value="{{ $ma }}" {{ ($ma == $population->married) ? 'checked' : '' }}>
                                <label class="custom-control-label"
                                    for="customRadioInline{{ $ma }}">{{ Str::ucfirst($ma) }}</label>
                            </div>
                        @endforeach
                        @error('married')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="job">Job</label>
                        <input type="text" name="job" class="form-control" value="{{ $population->job }}">
                        @error('job')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="father_name">Father Name</label>
                        <input type="text" name="father_name" class="form-control" value="{{ $population->father_name }}">
                        @error('father_name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mother_name">Mother Name</label>
                        <input type="text" name="mother_name" class="form-control" value="{{ $population->mother_name }}">
                        @error('mother_name')
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
