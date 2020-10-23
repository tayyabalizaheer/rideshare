@extends('agent.layout.master')
@section('import-css')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/jquery.simple-dtpicker.css')}}">
@endsection

@section('css')
    <style>
        .btn-light {
            background-color: #f8f9fa;
            border-color: #ced4da;
        }
        .bootstrap-select > .dropdown-toggle.bs-placeholder, .bootstrap-select > .dropdown-toggle.bs-placeholder:active, .bootstrap-select > .dropdown-toggle.bs-placeholder:focus, .bootstrap-select > .dropdown-toggle.bs-placeholder:hover {
            color: #1d1919;
        }
    </style>
@stop 


@section('body')

    <h2 class="mb-4">{{$page_title}}</h2>

    <div class="card mb-4">
        
        @foreach($TicketBooking as $TicketBooking_row)
        <form role="form" method="get" action="updatedate" name="editForm"
              enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="card-body">
                <div class="form-row">
                    <div class="offset-md-1 col-md-9 mb-3">
                        @include('errors.error')
                    </div>
                </div>

                


                <div class="form-row">
                    <div class="offset-md-1 col-md-9 mb-3">

                        <label><strong>Choose Boarding Point <span class="text-danger">*</span></strong></label>

                        <select name="boarding" id="stoppage" class="form-control form-control-lg boarding_point">

                            <option value="">Boarding Point</option>

                            @foreach($stoppage as $board)

                            <option value="{{$board}}">{{$board}}</option>

                            @endforeach

                        </select>

                    </div>

                    <div class="offset-md-1 col-md-9 mb-3">
                        <label><strong>Fleet Type. <span class="error">*</span></strong></label>
                        <select name="fleet_types"
                                class="form-control form-control-lg selectpicker @if ($errors->has('fleet_types'))  is-invalid @endif"
                                data-live-search="true">

                            @foreach($fleet_types as $data)
                                @if($data->id == $TicketBooking_row->fleet_type_id)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                                @else
                                <option value="{{$data->id}}">{{$data->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <input type="text" name="id" hidden="hidden" value="{{$TicketBooking_row->id}}">
                    <div class="offset-md-1 col-md-9 mb-3">
                        <label><strong>Passenger Name <span class="error">*</span></strong></label>
                        <input name="passenger_name" class="form-control form-control-lg" type="text"
                               placeholder="Passenger Name" id="start_date" value="{{$TicketBooking_row->passenger_name}}">
                    </div>

                    <div class="offset-md-1 col-md-9 mb-3">
                        <label><strong>Booking Date<span class="error">*</span></strong></label>
                        <input name="booking_date" class="form-control form-control-lg datetimepicker" type="text"
                               placeholder="Trip End Date" id="end_date" value="{{$TicketBooking_row->booking_date}}">
                    </div>

                </div>


            </div>

            <div class="card-footer bg-white">
                <button class="btn btn-success btn-block btn-lg" type="submit">Save</button>
            </div>

        </form>
        @endforeach
    </div>



@endsection

@section('import-script')

    <script src="{{asset('assets/admin/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/jquery.simple-dtpicker.js')}}"></script>

@stop
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.datetimepicker').appendDtpicker();
        })

    </script>
@stop