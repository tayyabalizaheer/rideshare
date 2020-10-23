@extends('user')
@section('driver')
    <div class="card">
        <div class="card-header bg-white font-weight-bold">
            <div class="float-left">
                <h2 class="mb-4">{{$page_title}}</h2>
            </div>

            <div class="float-right">
                <a href="{{route('trip-assign.create')}}" class="btn btn-success  btn-icon"> <i
                            class="fa fa-plus"></i> Add New </a>
            </div>
        </div>
        <div class="card-body">
            @include('errors.error')

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Trip Id</th>
                    <th>Vehical</th>
                    <th>Route Name</th>
                    <th>Trip Start Date</th>
                    <th>Arrival Time</th>

                    <th>Status</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>

                @foreach($tripAssign as $k=>$data)
                    <tr>
                        <td data-label="SL">{{++$k}}</td>
                        <td data-label="Trip Id"><strong>{{$data->id_no}}</strong></td>
                        <td data-label="Registration No.">
                            <strong>{{$data->fleetRegistration->reg_name}}</strong>
                        </td>
                        <td data-label="Route Name">
                            <strong>{{$data->tripRoute->name}}</strong>
                        </td>
                        <td data-label="Trip Start Date">{{date('d M Y h:i A',strtotime($data->start_date))}}</td>
                        <td data-label="Trip End Date">{{date('d M Y h:i A',strtotime($data->end_date))}}</td>
                        <td data-label="Status">
                            <span class="badge  badge-pill  badge-{{ $data->status ==0 ? 'danger' : 'success' }}">{{ $data->status == 0 ? 'Deactive' : 'Active' }}</span>
                        </td>
                        <td data-label="Action">
                            <a href="{{route('trip-assign.edit',$data->id)}}"
                               class="btn btn-info  btn-icon btn-pill" title="Edit">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="{{route('trip-assign.close',$data->id)}}"
                               class="btn btn-info  btn-icon btn-pill" title="Close">
                                <i class="fa fa-times"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {!! $tripAssign->render() !!}
        </div>
    </div>

@endsection

@section('script')
@endsection