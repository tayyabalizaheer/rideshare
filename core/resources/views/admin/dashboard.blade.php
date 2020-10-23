@extends('admin.layout.master')

@section('body')


 <h4 class="mb-4"><i class="fa fa-users"></i> Fleet, Trip, Ticket Statistics</h4>
    <div class="row mb-4">
        <div class="col-md">
            <a href="{{route('fleet-registration')}}" class="textDecoration">
                <div class="d-flex border">
                    <div class="bg-success text-light p-4">
                        <div class="d-flex align-items-center h-100">
                            <i class="fa-fw fas fa-bus fa-3x"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 bg-white p-4">
                        <p class="text-uppercase text-secondary mb-0">Fleet Registration</p>
                        <h3 class="font-weight-bold mb-0">{{$fleetRegistration}}</h3>
                    </div>
                </div>
            </a>
        </div>


          <div class="col-md">
            <a href="{{route('manage-route')}}" class="textDecoration">
                <div class="d-flex border">
                    <div class="bg-danger text-light p-4">
                        <div class="d-flex align-items-center h-100">
                            <i class="fa fa-3x fa-fw fa-road"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 bg-white p-4">
                        <p class="text-uppercase text-secondary mb-0">Trip / Route </p>
                        <h3 class="font-weight-bold mb-0">{{$tripRoute}}</h3>
                    </div>
                </div>
            </a>
        </div>

        
        <div class="col-md">
            <a href="{{route('request-cancel')}}" class="textDecoration">
                <div class="d-flex border">
                    <div class="bg-info text-light p-4">
                        <div class="d-flex align-items-center h-100">
                            <i class="fa fa-3x fa-fw fa-reply"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 bg-white p-4">
                        <p class="text-uppercase text-secondary mb-0">Ticket-Cancel Request</p>
                        <h3 class="font-weight-bold mb-0">{{$ticketCancel}}</h3>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md">
            <a href="{{route('enquiry.index')}}" class="textDecoration">
                <div class="d-flex border">
                    <div class="bg-warning text-light p-4">
                        <div class="d-flex align-items-center h-100">
                            <i class="fa fa-3x fa-fw fa-question"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 bg-white p-4">
                        <p class="text-uppercase text-secondary mb-0">New Enquiries</p>
                        <h3 class="font-weight-bold mb-0">{{$enquiries}}</h3>
                    </div>
                </div>
            </a>
        </div>
        

      

    </div>



    <h4 class="mb-4"><i class="fa fa-users"></i> User Statistics</h4>
    <div class="row mb-4">
        <div class="col-md">
            <a href="{{route('users')}}" class="textDecoration">
                <div class="d-flex border">
                    <div class="bg-primary text-light p-4">
                        <div class="d-flex align-items-center h-100">
                            <i class="fa fa-3x fa-fw fa-users"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 bg-white p-4">
                        <p class="text-uppercase text-secondary mb-0">Total Users</p>
                        <h3 class="font-weight-bold mb-0">{{$totalUsers}}</h3>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md">
            <a href="{{route('users')}}" class="textDecoration">
                <div class="d-flex border">
                    <div class="bg-success text-light p-4">
                        <div class="d-flex align-items-center h-100">
                            <i class="fa fa-3x fa-fw fa-users"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 bg-white p-4">
                        <p class="text-uppercase text-secondary mb-0">Email Verified</p>
                        <h3 class="font-weight-bold mb-0">{{$email_verify}}</h3>
                    </div>
                </div>
            </a>
        </div>
        

        <div class="col-md">
            <a href="{{route('user.ban')}}" class="textDecoration">
                <div class="d-flex border">
                    <div class="bg-danger text-light p-4">
                        <div class="d-flex align-items-center h-100">
                            <i class="fa fa-3x fa-fw fa-users"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 bg-white p-4">
                        <p class="text-uppercase text-secondary mb-0">Ban Users</p>
                        <h3 class="font-weight-bold mb-0">{{$banUsers}}</h3>
                    </div>
                </div>
            </a>
        </div>

    </div>



    <div class="row">
       
        <div class="col-md-6">
            <h4 class="mb-4">  <i class="fas fa-credit-card"></i> Deposit Statistics </h4>
            <div class="row mb-4">
                <div class="col-md">
                    <a href="{{route('gateway')}}" class="textDecoration">
                        <div class="d-flex border">
                            <div class="bg-success text-light p-4">
                                <div class="d-flex align-items-center h-100">
                                    <i class="fa-3x  fas fa-credit-card"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 bg-white p-4">
                                <p class="text-uppercase text-secondary mb-0">Deposit Method</p>
                                <h3 class="font-weight-bold mb-0">{{$gateway}}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md">
                    <a href="{{route('deposits')}}" class="textDecoration">
                        <div class="d-flex border">
                            <div class="bg-info text-light p-4">
                                <div class="d-flex align-items-center h-100">
                                    <i class="fas fa-dollar-sign fa-3x"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 bg-white p-4">
                                <p class="text-uppercase text-secondary mb-0">Number Of Deposit</p>
                                <h3 class="font-weight-bold mb-0">{{$deposit}}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>



    <h4 class="mb-4"><i class="fa fa-th"></i> Withdraw Statistics</h4>
    <div class="row mb-4">
        <div class="col-md">
            <a href="{{route('withdraw')}}" class="textDecoration">
                <div class="d-flex border">
                    <div class="bg-info text-light p-4">
                        <div class="d-flex align-items-center h-100">
                            <i class="fa fa-3x fa-fw fa-list"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 bg-white p-4">
                        <p class="text-uppercase text-secondary mb-0">Withdraw Method</p>
                        <h3 class="font-weight-bold mb-0">{{$withdraw}}</h3>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md">
            <a href="{{route('withdraw.requests')}}" class="textDecoration">
                <div class="d-flex border">
                    <div class="bg-warning text-light p-4">
                        <div class="d-flex align-items-center h-100">
                            <i class="fa fa-3x fa-fw fa-spinner"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 bg-white p-4">
                        <p class="text-uppercase text-secondary mb-0">Pending Withdraw </p>
                        <h3 class="font-weight-bold mb-0">{{$withdrawReq}}</h3>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md">
            <a href="{{route('withdraw.approved')}}" class="textDecoration">
                <div class="d-flex border">
                    <div class="bg-success text-light p-4">
                        <div class="d-flex align-items-center h-100">
                            <i class="fa fa-3x fa-fw fa-check"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 bg-white p-4">
                        <p class="text-uppercase text-secondary mb-0">Success Withdraw </p>
                        <h3 class="font-weight-bold mb-0">{{$withdrawSuc}}</h3>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md">
            <a href="{{route('withdraw.refunded')}}" class="textDecoration">
                <div class="d-flex border">
                    <div class="bg-danger text-light p-4">
                        <div class="d-flex align-items-center h-100">
                            <i class="fa fa-3x fa-fw fa-times"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 bg-white p-4">
                        <p class="text-uppercase text-secondary mb-0">Refund Withdraw </p>
                        <h3 class="font-weight-bold mb-0">{{$withdrawRefund}}</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>













    <div class="row">
        <div class="col-md-6 ">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                    <div class="col-lg-12">
                        <h3 class="tile-title"><i class="fa fa-thumbs-up"></i> User Subscription</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="embed-responsive embed-responsive-16by9">
                            <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>


        <div class="col-md-6 ">

            <h4 class="mb-4"><i class="fa fa-info-circle"></i> Other Info</h4>
            <div class="row mb-4">
                <div class="col-md">
                    <a href="{{route('admin.blog')}}" class="textDecoration">
                        <div class="d-flex border">
                            <div class="bg-primary text-light p-4">
                                <div class="d-flex align-items-center h-100">
                                    <i class="fa fa-3x fa-fw fa-newspaper"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 bg-white p-4">
                                <p class="text-uppercase text-secondary mb-0">Total Blogs</p>
                                <h3 class="font-weight-bold mb-0">{{$blog}}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md">
                    <a href="{{route('manage.subscribers')}}" class="textDecoration">
                        <div class="d-flex border">
                            <div class="bg-success text-light p-4">
                                <div class="d-flex align-items-center h-100">
                                    <i class="fa fa-3x fa-fw fa-thumbs-up"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 bg-white p-4">
                                <p class="text-uppercase text-secondary mb-0"> Subscribers</p>
                                <h3 class="font-weight-bold mb-0">{{$subscribers}}</h3>
                            </div>
                        </div>
                    </a>
                </div>

            </div>




        </div>


    </div>



    @php

        $sell =  \App\Subscriber::whereYear('created_at', '=', date('Y'))->get()->groupBy(function($d) {
              return $d->created_at->format('F');
           });
           $monthly_sell = [];
           $month = [];
           foreach ($sell as $key => $value) {
            $monthly_sell[] = count($value);
            $month[] = $key;
           }
    @endphp




@endsection

@section('script')
    <script type="text/javascript" src="{{asset('assets/admin/js/chart.js')}}"></script>
    <script type="text/javascript">
        var data = {
            labels:  {!! json_encode($month) !!},
            datasets: [
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: {!! json_encode($monthly_sell) !!},
                }
            ]
        };


        var ctxl = $("#lineChartDemo").get(0).getContext("2d");
        var lineChart = new Chart(ctxl).Line(data);

    </script>

@stop

