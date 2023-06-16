@extends('template.base_admin')

@section('title')
    <title>{{ env('APP_NAME')  }} | Building Management</title>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">

                <h6>Building Management</h6>
                <a href="{{ route('building.management.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add New</a>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center">building_code</th>
                            <th class="text-center">building_name</th>
                            <th class="text-center">condition</th>
                            <th class="text-center">picture</th>
                            <th class="text-center">is rental</th>
                            <th class="text-center">Created</th>
                            <th class="text-center">Updated</th>
                            <th class="text-center"><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($building_management as $item)
                            
                        <tr>
                            <td class="text-center">{{ $item->building_code }}</td>
                            <td class="text-center">{{ $item->building_name }}</td>
                            <td class="text-center">{{ $item->condition }}</td>
                            <td class="text-center">
                                @if ($item->picture)
                                    
                                <img src="{{ asset($item->picture) }}" width="100px" alt="picture">
                                @else
                                    <i style="font-size: 50px;" class="fas fa-image"></i>
                                @endif
                            </td>
                            
                            <td class="text-center">{!! ($item->is_rental) ? "<div class='text-success'><i class='fa fa-check-circle'></i></div>" : "<div class='text-danger'><i class='fa fa-times-circle'></i></div>" !!}</td>
                            <td class="text-center">{{ $item->created_at }}</td>
                            <td class="text-center">{{ $item->updated_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('building.management.edit', ['id' => $item->id]) }}" class="btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('building.management.destroy',['id' => $item->id]) }}" class="btn-danger btn-sm delete-confirm"><i class="fa fa-trash"></i></a>
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