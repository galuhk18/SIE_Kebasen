@extends('template.base_admin')

@section('title')
    <title>{{ env('APP_NAME')  }} | Facility Management</title>
@endsection
@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Laporan Manajemen Fasilitas
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $facility_management_amount }}</div>
                    </div>
                    <div class="col-auto">
                        
                        <i class="fas fa-building fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">

                <h6>Facility Management</h6>
                @if(session()->has('admin_id'))
                <a href="{{ route('facility.management.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add New</a>
                @endif
            </div>
            <div>
                <a href="{{ route('facility.management.export') }}" class="btn btn-success"> <i class="fa fa-file-excel"></i>
                    Export</a>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center">facility_code</th>
                            <th class="text-center">facility_name</th>
                            <th class="text-center">condition</th>
                            <th class="text-center">picture</th>
                            <th class="text-center">stock</th>
                            <th class="text-center">Created</th>
                            <th class="text-center">Updated</th>
                            <th class="text-center"><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($facility_management as $item)
                            
                        <tr>
                            <td class="text-center">{{ $item->facility_code }}</td>
                            <td class="text-center">{{ $item->facility_name }}</td>
                            <td class="text-center">{{ $item->condition }}</td>
                            <td class="text-center">
                                @if ($item->picture)
                                    
                                <img src="{{ asset($item->picture) }}" width="100px" alt="picture">
                                @else
                                    <i style="font-size: 50px;" class="fas fa-image"></i>
                                @endif
                            </td>
                            
                            <td class="text-center">{{ $item->stock }}</td>
                            <td class="text-center">{{ $item->created_at }}</td>
                            <td class="text-center">{{ $item->updated_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('facility.management.edit', ['id' => $item->id]) }}" class="btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('facility.management.destroy',['id' => $item->id]) }}" class="btn-danger btn-sm delete-confirm"><i class="fa fa-trash"></i></a>
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