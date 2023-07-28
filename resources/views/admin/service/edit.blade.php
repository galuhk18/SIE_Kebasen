@extends('template.base_admin')

@section('title')
<title>{{ env('APP_NAME') }} | User Admin</title>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h6>Edit Data Layanan</h6>
        <hr>
        <form action="{{ route('service.update',['id' => $service->id]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">NIK</label>
                        <input type="text" name="nik" class="form-control" value="{{ $service->nik }}">
                        @error('nik')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ $service->name }}">
                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="date_of_service">Tanggal Layanan</label>
                        <input type="date" name="date_of_service" class="form-control" value="{{ $service->date_of_service }}">
                        @error('date_of_service')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="information">Keterangan</label>
                        <textarea name="information" class="form-control">{{ $service->information }}</textarea>
                        @error('information')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="service_type">Jenis Layanan</label>
                        <select name="service_type" class="custom-select">
                            <option value=""></option>
                            @foreach ($service_type as $item)
                                
                            <option value="{{ $item }}" {{ ($item == $service->service_type) ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                        @error('service_type')
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
