@extends('template.base_admin')

@section('title')
    <title>{{ env('APP_NAME')  }} | Activity Report</title>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">

                <h6>Activity Report</h6>
                <a href="{{ route('activity.report.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add New</a>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center">Date of Activity</th>
                            <th class="text-center">organization_name</th>
                            <th class="text-center">information</th>
                            <th class="text-center">person_responsible</th>
                            <th class="text-center">documentation</th>
                            <th class="text-center">status</th>
                            <th class="text-center">Created</th>
                            <th class="text-center">Updated</th>
                            <th class="text-center"><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activity_report as $item)
                            
                        <tr>
                            <td class="text-center">{{ $item->date_of_activity }}</td>
                            <td class="text-center">{{ $item->organization_name }}</td>
                            <td class="text-center">{{ $item->information }}</td>
                            <td class="text-center">{{ $item->person_responsible }}</td>
                            <td class="text-center">
                                <img src="{{ asset($item->documentation) }}" width="100px" alt="documentaion">
                            </td>
                            
                            <td class="text-center">{{ $activity_report_status[$item->status] }}</td>
                            <td class="text-center">{{ $item->created_at }}</td>
                            <td class="text-center">{{ $item->updated_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('activity.report.edit', ['id' => $item->id]) }}" class="btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('activity.report.destroy',['id' => $item->id]) }}" class="btn-danger btn-sm delete-confirm"><i class="fa fa-trash"></i></a>
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