@extends('template.base_admin')

@section('title')
    <title>{{ env('APP_NAME')  }} | Facility Rental</title>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">

                <h6>Facility Rental</h6>
                <a href="{{ route('facility.rental.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add New</a>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center">facility_code</th>
                            <th class="text-center">facility_name</th>
                            <th class="text-center">amount</th>
                            <th class="text-center">start_date</th>
                            <th class="text-center">end_date</th>
                            <th class="text-center">person_responsible</th>
                            <th class="text-center">telp</th>
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