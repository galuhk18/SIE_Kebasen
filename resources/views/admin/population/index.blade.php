@extends('template.base_admin')

@section('title')
    <title>{{ env('APP_NAME')  }} | Facility</title>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">

                <h6>Population</h6>
                <a href="{{ route('population.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add New</a>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Familiy Card / KK</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Dateof Birth</th>
                            <th class="text-center">Birth Place</th>
                            <th class="text-center">Date of Birth</th>
                            <th class="text-center">Phone Mumber</th>
                            <th class="text-center">Religion</th>
                            <th class="text-center">Citizenship</th>
                            <th class="text-center">Married</th>
                            <th class="text-center">Job</th>
                            <th class="text-center">Father name</th>
                            <th class="text-center">Mother name</th>
                            <th class="text-center">Created</th>
                            <th class="text-center">Updated</th>
                            <th class="text-center"><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($population as $item)
                            
                        <tr>
                            <td class="text-center">{{ $item->nik }}</td>
                            <td class="text-center">{{ $item->family_card }}</td>
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center">{{ $item->gender }}</td>
                            <td class="text-center">{{ $item->address }}</td>
                            <td class="text-center">{{ $item->date_of_birth }}</td>
                            <td class="text-center">{{ $item->birth_place }}</td>
                            <td class="text-center">{{ $item->phone_number }}</td>
                            <td class="text-center">{{ $item->religion }}</td>
                            <td class="text-center">{{ $item->citizenship }}</td>
                            <td class="text-center">{{ $item->married }}</td>
                            <td class="text-center">{{ $item->job }}</td>
                            <td class="text-center">{{ $item->father_name }}</td>
                            <td class="text-center">{{ $item->mother_name }}</td>
                            <td class="text-center">{{ $item->created_at }}</td>
                            <td class="text-center">{{ $item->updated_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('population.edit', ['id' => $item->id]) }}" class="btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('population.destroy',['id' => $item->id]) }}" class="btn-danger btn-sm delete-confirm"><i class="fa fa-trash"></i></a>
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