@extends('admin.layout.master')
@section('body')
    <div class="card">
        <div class="card-header bg-white font-weight-bold">
            <div class="float-left">
                <h2 class="mb-4">{{$page_title}}</h2>
            </div>

            <div class="float-right">
                <a href="{{route('manage-location.create')}}" class="btn btn-success  btn-icon"> <i
                            class="fa fa-plus"></i> Add New </a>
            </div>
        </div>
        <div class="card-body">
            @include('errors.error')

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Location Name</th>
                    <th>Status</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>

                @foreach($location as $k=>$data)
                    <tr>
                        <td data-label="SL">{{++$k}}</td>
                        <td data-label="Location Name"><strong>{{$data->name}}</strong></td>
                        <td data-label="Status">
                            <span class="badge  badge-pill  badge-{{ $data->status ==0 ? 'danger' : 'success' }}">{{ $data->status == 0 ? 'Deactive' : 'Active' }}</span>
                        </td>
                        <td data-label="Action">
                            <a href="{{route('manage-location.edit',$data->id)}}"
                               class="btn btn-info  btn-icon btn-pill" title="Edit">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {!! $location->render() !!}
        </div>
    </div>

@endsection

@section('script')
@endsection