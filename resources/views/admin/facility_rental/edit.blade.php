@extends('template.base_admin')

@section('title')
<title>{{ env('APP_NAME') }} | Sewa Fasilitas</title>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h6>Edit Sewa Fasilitas</h6>
        <hr>
        <form action="{{ route('facility.rental.update',['id' => $facility_rental->id]) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    

                    <div class="form-group">
                        <label for="facility_code">Kode Fasilitas</label>
                        <select name="facility_code" class="custom-select2 custom-select" id="facility_code" disabled>
                            <option value=""></option>
                            @foreach ($facility as $item)
                                <option value="{{ $item->facility_code }}" {{ ($item->facility_code == $facility_rental->facility_code) ? "selected" : "" }}>{{ $item->facility_code . " | " . $item->facility_name }}</option>
                            @endforeach
                        </select>
                        @error('facility_code')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="amount">Jumlah</label>
                        <input type="number" name="amount" class="form-control" value="{{ $facility_rental->amount }}">
                        @error('amount')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="start_date">Tanggal Mulai</label>
                        <input type="datetime-local" name="start_date" class="form-control" value="{{ $facility_rental->start_date }}">
                        @error('start_date')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="end_date">Tanggal Selesai</label>
                        <input type="datetime-local" name="end_date" class="form-control" value="{{ $facility_rental->end_date }}">
                        @error('end_date')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                   

                    

                   


                </div>

                <div class="col-lg-6">

                    <div class="form-group">
                        <label for="rental_reasons">Nama Kegiatan</label>
                        <textarea name="rental_reasons" class="form-control">{{ $facility_rental->rental_reasons }}</textarea>
                        @error('rental_reasons')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="person_responsible">Penanggung Jawab</label>
                        <input type="text" name="person_responsible" class="form-control" value="{{ $facility_rental->person_responsible }}">
                        @error('person_responsible')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="telp">Nomor HP</label>
                        <input type="tel" name="telp" class="form-control" value="{{ $facility_rental->telp }}">
                        @error('telp')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    @if (session()->has('executive_id'))
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="custom-select" id="status">
                           
                            @foreach ($rental_status as $index => $retus)
                                <option value="{{ $index }}" {{ ($retus == $facility_rental->status) ? "selected" : "" }}>{{ $retus }}</option>
                            @endforeach
                        </select>
                        @error('status')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    @endif
                </div>
            </div>


            <div class="d-flex justify-content-end">

                <button type="submit" class="btn btn-info btn-lg">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.min.css') }}">
@endsection
@section('script')
<script src="{{ asset('assets/vendor/select2/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.custom-select2').select2();
    });
</script>
@endsection
