@extends('template.base_admin')

@section('title')
<title>{{ env('APP_NAME') }} | Service</title>
@endsection
@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Laporan Layanan
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $service_amount }}</div>
                    </div>
                    <div class="col-auto">

                        <i class="fa fa-file-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">

            <h6>Service</h6>
            @if(session()->has('admin_id'))
            <a href="{{ route('service.create') }}" class="btn btn-primary"> <i
                    class="fa fa-plus"></i> Add New</a>
            @endif
        </div>
        <div>
            <a href="{{ route('service.export') }}" class="btn btn-success"> <i
                class="fa fa-file-excel"></i> Export</a>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th class="text-center">NIK</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Date of Service</th>
                        <th class="text-center">Information</th>
                        <th class="text-center">Service Type</th>
                        <th class="text-center">Created</th>
                        <th class="text-center">Updated</th>
                        <th class="text-center"><i class="fa fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($service as $item)

                        <tr>
                            <td class="text-center">{{ $item->nik }}</td>
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center">{{ $item->date_of_service }}</td>
                            <td class="text-center">{{ $item->information }}</td>
                            <td class="text-center">{{ $item->service_type }}</td>
                            <td class="text-center">{{ $item->created_at }}</td>
                            <td class="text-center">{{ $item->updated_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('service.edit', ['id' => $item->id]) }}"
                                    class="btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('service.destroy',['id' => $item->id]) }}"
                                    class="btn-danger btn-sm delete-confirm"><i class="fa fa-trash"></i></a>
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
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });

</script>
@endsection
