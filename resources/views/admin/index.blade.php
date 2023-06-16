@extends('template.base_admin')
@section('content')
    <div class="card">
        <div class="card-body">
            @if (session()->has('admin_id'))
                <div class="text-center">
                    <h1>Administrator</h1>
                    <p>{{ env('APP_NAME') }}</p>
                </div>
            @endif
        </div>
    </div>
@endsection