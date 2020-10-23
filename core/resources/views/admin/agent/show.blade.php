@extends('admin.layout.master')

@section('body')


    <div class="card">
        <div class="card-header bg-white font-weight-bold">

            <div class="float-left">
                <h2 class="mb-4">{{$page_title}}</h2>
            </div>

            <div class="float-right">
                <a href="javascript:void(0)" class="btn btn-success btn-md" onclick="window.print();">
                    <i class="fa fa-print"></i>
                </a>
                @if($data->pic_document != null)
                    <a href="{{asset('assets/images/agent/'.$data->pic_document)}}" class="btn btn-danger btn-md"
                       download>
                        <i class="fa fa-download"></i> Document Picture
                    </a>
                @endif

            </div>
        </div>
        <div class="card-body">

            <table class="table table-hover" >
                <thead>
                <tr>
                    <th colspan="2"><img src="{{asset('assets/images/agent/'.$data->picture)}}" width="200"
                                         height="200"></th>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <th colspan="2">{{$data->first_name}} {{$data->last_name}}</th>
                </tr>
                <tr>
                    <th>Username</th>
                    <th colspan="2">{{$data->username}}</th>
                </tr>
                <tr>
                    <td>Company Name</td>
                    <td>{{$data->company_name}}</td>
                </tr>
                <tr>
                    <td>Email Address</td>
                    <td>{{$data->email}}</td>
                </tr>

                <tr>
                    <td>Contact Number</td>
                    <td>{{$data->phone}}</td>
                </tr>
                @if($data->present_address != null)
                    <tr>
                        <td>Present Address</td>
                        <td>{{$data->present_address}}</td>
                    </tr>
                @endif
                @if($data->permanent_address != null)
                    <tr>
                        <td>Permanent Address</td>
                        <td>{{$data->permanent_address}}</td>
                    </tr>
                @endif


                @if($data->city != null)
                    <tr>
                        <td>City</td>
                        <td>{{$data->city}}</td>
                    </tr>
                @endif

                @if($data->zip_code != null)
                    <tr>
                        <td>Zip Code</td>
                        <td>{{$data->zip_code}}</td>
                    </tr>
                @endif
                @if($data->country != null)
                    <tr>
                        <td>Country</td>
                        <td>{{$data->country}}</td>
                    </tr>
                @endif

                </thead>
            </table>


        </div>
    </div>


@endsection
@section('script')

@endsection