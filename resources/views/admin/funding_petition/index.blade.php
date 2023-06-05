@extends('template.base_admin')

@section('title')
    <title>{{ env('APP_NAME')  }} | Funding Petition</title>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">

                <h6>Funding Petition</h6>
                <a href="{{ route('funding.petition.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add New</a>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center">Date of Activity</th>
                            <th class="text-center">organization_name</th>
                            <th class="text-center">budget_amount</th>
                            <th class="text-center">event_name</th>
                            <th class="text-center">person_responsible</th>
                            <th class="text-center">proposal</th>
                            <th class="text-center">status</th>
                            <th class="text-center">Created</th>
                            <th class="text-center">Updated</th>
                            <th class="text-center"><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($funding_petition as $item)
                            
                        <tr>
                            <td class="text-center">{{ $item->date_of_activity }}</td>
                            <td class="text-center">{{ $item->organization_name }}</td>
                            <td class="text-center">{{ $item->budget_amount }}</td>
                            <td class="text-center">{{ $item->event_name }}</td>
                            <td class="text-center">{{ $item->person_responsible }}</td>
                            <td class="text-center">
                                <a href="{{ asset($item->proposal) }}" target="_blank">{{ $item->proposal }}</a>
                            </td>
                            <td class="text-center">{{ $item->created_at }}</td>
                            <td class="text-center">{{ $item->updated_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('funding.petition.edit', ['id' => $item->id]) }}" class="btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('funding.petition.destroy',['id' => $item->id]) }}" class="btn-danger btn-sm delete-confirm"><i class="fa fa-trash"></i></a>
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