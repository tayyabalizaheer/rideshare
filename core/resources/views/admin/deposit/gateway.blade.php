@extends('admin.layout.master')
@section('import-css')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@stop
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white font-weight-bold ">
                    <h2>{{$page_title}}</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Gateway Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($gateways as $k=>$gateway)
                                <tr>
                                    <td>{{ ++$k }}</td>
                                    <td><strong>{{ $gateway->name }}</strong></td>
                                    <td>
                                        @if($gateway->status == 1)
                                            <span class="badge  badge-pill  badge-success">Active</span>
                                        @else
                                            <span class="badge  badge-pill  badge-danger">DeActve</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('gateway.edit',$gateway->id)}}" class="btn btn-primary btn-sm btn-icon btn-pill" title="Edit"
                                                data-act="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                    </td>
                                </tr>

                            @endforeach
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('import-script')
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
@stop