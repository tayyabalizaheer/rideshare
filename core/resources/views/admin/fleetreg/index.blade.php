@extends('admin.layout.master')
@section('body')
    <div class="card">
        <div class="card-header bg-white font-weight-bold">
            <div class="float-left">
            <h2 class="mb-4">{{$page_title}}</h2>
            </div>

            <div class="float-right">
                <a href="{{route('fleet-registration.create')}}" class="btn btn-success  btn-icon"> <i class="fa fa-plus"></i> Add New </a>
            </div>
        </div>
        <div class="card-body">
            @include('errors.error')

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Registration</th>
                    <th>Fleet Type</th>
                    <th>Engine No.</th>
                    <th>Model No.</th>
                    <th>Chasis No.</th>
                    <th>Total Seat</th>
                    <th>Fleet Facilities</th>
                    <th>Owner</th>
                    <th>Company Name</th>
                    <th>AC Available</th>
                    <th>Status</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>

                @foreach($fleet as $k=>$data)
                    <tr>
                        <td data-label="SL">{{++$k}}</td>
                        <td data-label="Registration">{{$data->reg_no}}</td>
                        <td data-label="Fleet Type"><strong>{{$data->fleetType->name}}</strong></td>
                        <td data-label="Engine No.">{{$data->engine_no}}</td>
                        <td data-label="Model No.">{{$data->model_no}}</td>
                        <td data-label="Chasis No.">{{$data->chasis_no}}</td>
                        <td data-label="Total Seat"><strong>{{$data->total_seat}}</strong></td>
                        <td data-label="Fleet Facilities">{{$data->fleet_facilities}}</td>
                        <td data-label="Owner">{{$data->owner}}</td>
                        <td data-label="Company Name">{{$data->company}}</td>
                        <td data-label="AC Available">
                            <span class="badge  badge-pill  badge-{{ $data->ac_available ==0 ? 'danger' : 'success' }}">{{ $data->ac_available == 0 ? 'No' : 'Yes' }}</span>
                        </td>
                        <td data-label="Status">
                            <span class="badge  badge-pill  badge-{{ $data->status ==0 ? 'danger' : 'success' }}">{{ $data->status == 0 ? 'Deactive' : 'Active' }}</span>
                        </td>
                        <td data-label="Action">
                            <a href="{{route('fleet-registration.edit',$data->id)}}"  class="btn btn-info  btn-icon btn-pill" title="Edit">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {!! $fleet->render() !!}
        </div>
    </div>

@endsection

@section('script')
@endsection