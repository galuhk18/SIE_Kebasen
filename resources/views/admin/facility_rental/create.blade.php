@extends('template.base_admin')

@section('title')
<title>{{ env('APP_NAME') }} | Sewa Fasilitas</title>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h6>Tambah Data Sewa Fasilitas</h6>
        <hr>
        <form action="{{ route('facility.rental.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    

                    <div class="form-group">
                        <label for="facility_code">Kode Fasilitas</label>
                        <select name="facility_code" class="custom-select2 custom-select" id="facility_code">
                            <option value=""></option>
                            @foreach ($facility as $item)
                                <option value="{{ $item->facility_code }}">{{ $item->facility_code . " | " . $item->facility_name }}</option>
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
                        <input type="number" name="amount" class="form-control">
                        @error('amount')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="start_date">Tanggal Mulai</label>
                        <input type="datetime-local" name="start_date" class="form-control">
                        @error('start_date')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="end_date">Tanggal Selesai</label>
                        <input type="datetime-local" name="end_date" class="form-control">
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
                        <textarea name="rental_reasons" class="form-control"></textarea>
                        @error('rental_reasons')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    
                    <div class="form-group">
                        <label for="person_responsible">Penanggung Jawab</label>
                        <input type="text" name="person_responsible" class="form-control">
                        @error('person_responsible')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="telp">Nomor HP</label>
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

                <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
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
