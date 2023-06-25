@extends('template.base_admin')

@section('title')
    <title>{{ env('APP_NAME')  }} | Death</title>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">

                <h6>Death</h6>
                <a href="{{ route('death.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add New</a>
            </div>
            <div>
                <a href="{{ route('death.export') }}" class="btn btn-success"> <i
                        class="fa fa-file-excel"></i> Export</a>
                @if (session()->has('admin_id'))
                    
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#importModal">
                    <i class="fa fa-file-excel"></i> Import
                </button>
    
                <!-- Modal -->
                <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h5 class="modal-title text-white" id="exampleModalLabel">Import</h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('death.import') }}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="file">Upload File Form Excel</label>
                                    
                                    <input type="file" name="file" class="form-control">
                                    <small class="text-danger">*) Format Date of death : 1997-05-11</small>
                                    @error('file')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <a href="{{ route('death.form.export') }}" class="btn-link text-success mt-5">Download Form</a>
                            </div>
                            <div class="modal-footer">
                               
                                <button type="submit" class="btn btn-success"> <i class="fa fa-upload"></i> Upload</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Family Card / KK</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Date of death</th>
                            <th class="text-center">Informer</th>
                            <th class="text-center">Informer Status</th>
                            <th class="text-center">Created</th>
                            <th class="text-center">Updated</th>
                            <th class="text-center"><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($death as $item)
                            
                        <tr>
                            <td class="text-center">{{ $item->nik }}</td>
                            <td class="text-center">{{ $item->family_card }}</td>
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center">{{ $item->address }}</td>
                            <td class="text-center">{{ $item->date_of_death }}</td>
                            <td class="text-center">{{ $item->informer }}</td>
                            <td class="text-center">{{ $item->informer_status }}</td>
                            <td class="text-center">{{ $item->created_at }}</td>
                            <td class="text-center">{{ $item->updated_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('death.edit', ['id' => $item->id]) }}" class="btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('death.destroy',['id' => $item->id]) }}" class="btn-danger btn-sm delete-confirm"><i class="fa fa-trash"></i></a>
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
    $('#dataTable').DataTable({
        scrollX:true,
        width: 100%
    });
  });
</script>
@endsection