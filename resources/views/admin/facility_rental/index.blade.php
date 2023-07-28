@extends('template.base_admin')

@section('title')
    <title>{{ env('APP_NAME')  }} | Sewa Fasilitas</title>
@endsection
@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Laporan Penyewaan Fasilitas
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $facility_rental_amount }}</div>
                    </div>
                    <div class="col-auto">

                        <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


</div>
<div class="row">
    @foreach ($facility_rental_amount_status as $index => $item)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{ $rental_status[$index] }}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item }}</div>
                        </div>
                        <div class="col-auto">

                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">

                <h6>Facility Rental</h6>
                @if (session()->has('admin_id'))
                <a href="{{ route('facility.rental.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah</a>
                @endif
            </div>
            <a href="{{ route('facility.rental.export') }}" class="btn btn-success"> <i
                class="fa fa-file-excel"></i> Export</a>
            <hr>
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center">Kode Fasilitas</th>
                            <th class="text-center">Nama Fasilitas</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Tanggal Mulai</th>
                            <th class="text-center">Tanggal Selesai</th>
                            <th class="text-center">Penanggung Jawab</th>
                            <th class="text-center">Nomor HP</th>
                            <th class="text-center">status</th>
                            <th class="text-center">Created</th>
                            <th class="text-center">Updated</th>
                            <th class="text-center"><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($facility_rental as $item)
                            
                        <tr>
                            <td class="text-center">{{ $item->facility_code }}</td>
                            <td class="text-center">{{ $item->facility_name }}</td>
                            <td class="text-center">{{ $item->amount }}</td>
                            <td class="text-center">{{ $item->start_date }}</td>
                            <td class="text-center">{{ $item->end_date }}</td>
                            <td class="text-center">{{ $item->person_responsible }}</td>
                            <td class="text-center">{{ $item->telp }}</td>
                            <td class="text-center">{{ $rental_status[$item->status] }}</td>
                            <td class="text-center">{{ $item->created_at }}</td>
                            <td class="text-center">{{ $item->updated_at }}</td>
                            <td class="text-center">
                                <div class="btn-group">

                                    <a href="{{ route('facility.rental.edit', ['id' => $item->id]) }}" class="btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('facility.rental.destroy',['id' => $item->id]) }}" class="btn-danger btn-sm delete-confirm"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>
@endsection