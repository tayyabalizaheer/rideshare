@extends('admin.layout.master')

@section('body')

    <h2 class="mb-4">{{$page_title}}</h2>

    <div class="card">
        <div class="card-header bg-white font-weight-bold">
            <a href="{{route('agent.create')}}" class="btn btn-success btn-md float-right ">
                <i class="fa fa-user-plus"></i> Add Agent
            </a>
        </div>
        <div class="card-body">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Picture</th>
                    <th>Agent Name</th>
                    <th>Company Name</th>
                    <th>Phone</th>
                    <th>E-mail</th>
                    <th>Balance</th>
                    <th>Status</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>

                @foreach($agents as $k=>$data)
                    <tr>
                        <td data-label="SL">{{++$k}}</td>
                        <td data-label="Picture">
                            <img src="{{asset('assets/images/agent/'.$data->picture)}}" class="img-thumbnail" height="60px" width="60px" alt="..">
                        </td>
                        <td data-label="Agent Name"><strong>{{$data->first_name}} {{$data->last_name}}</strong></td>
                        <td data-label="Company Name"><strong>{{$data->company_name}}</strong></td>
                        <td data-label="Phone">{{$data->phone}}</td>
                        <td data-label="Email">{{$data->email}}</td>
                        <td data-label="Balance"><strong>{{round($data->balance, $basic->decimal)}} {{$basic->currency}}</strong></td>
                        <td data-label="Status">
                            <span class="badge  badge-pill  badge-{{ $data->status ==0 ? 'warning' : 'success' }}">{{ $data->status == 0 ? 'Deactive' : 'Active' }}</span>
                        </td>
                        <td data-label="Action">
                            <a href="{{route('agent.edit',$data->id)}}" class="btn btn-primary  btn-icon btn-pill" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a href="{{route('agent.show',$data->id)}}" class="btn btn-success  btn-icon btn-pill" title="Details">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            {!! $agents->render() !!}
        </div>
    </div>


@endsection
@section('script')

@endsection