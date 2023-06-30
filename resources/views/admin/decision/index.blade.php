@extends('template.base_admin')

@section('title')
    <title>{{ env('APP_NAME')  }} | Decision</title>
@endsection
@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Laporan Keputusan
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $decision_amount }}</div>
                    </div>
                    <div class="col-auto">
                        
                        <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">

                <h6>Decision</h6>
                @if(session()->has('admin_id'))
                <a href="{{ route('decision.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add New</a>
                @endif
            </div>
            <div>
                <a href="{{ route('decision.export') }}" class="btn btn-success"> <i
                    class="fa fa-file-excel"></i> Export</a>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center">Decision</th>
                            <th class="text-center">type_of_decision</th>
                            <th class="text-center">problem</th>
                            <th class="text-center">decision_date</th>
                            <th class="text-center">documentasion</th>
                            <th class="text-center">realization_date</th>
                            <th class="text-center">Created</th>
                            <th class="text-center">Updated</th>
                            <th class="text-center"><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($decision as $item)
                            
                        <tr>
                            <td class="text-center">{{ $item->decision }}</td>
                            <td class="text-center">{{ $item->type_of_decision }}</td>
                            <td class="text-center">{{ $item->problem }}</td>
                            <td class="text-center">{{ $item->decision_date }}</td>
                            <td class="text-center">
                                @if ($item->documentasion)
                                    <img width="100px" src="{{ asset($item->documentasion) }}" alt="">    
                                @else
                                - 
                                @endif
                            </td>
                            <td class="text-center">{{ $item->realization_date }}</td>
                            <td class="text-center">{{ $item->created_at }}</td>
                            <td class="text-center">{{ $item->updated_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('decision.edit', ['id' => $item->id]) }}" class="btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('decision.destroy',['id' => $item->id]) }}" class="btn-danger btn-sm delete-confirm"><i class="fa fa-trash"></i></a>
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