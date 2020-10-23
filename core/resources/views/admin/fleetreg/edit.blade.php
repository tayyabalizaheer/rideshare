@extends('admin.layout.master')
@section('import-css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/token/bootstrap-tokenfield.min.css')}}">

    <script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>
@stop
@section('css')
    <style type="text/css">
        .midlesp{
            padding: 20px;
        }
        .docIcon {
            background:url("assets/images/f2dcc1cda37a23d4dd30125ebf2ac6ae.png") no-repeat center,url("assets/images/f2dcc1cda37a23d4dd30125ebf2ac6ae.png") no-repeat center;
            display: block;
            width: 60px;
            height: 60px;
            margin-left:auto;
            margin-right:auto;
            text-align:center;
            display:inline-block;
        }
        .altcss {
            background:url("assets/images/f2dcc1cda37a23d4dd30125ebf2ac6ae.png") no-repeat center;
        }
        #cont{
            text-align:center;
        }
    </style>
@stop

@section('body')

    <h2 class="mb-4">{{$page_title}}</h2>

    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            <a href="{{route('fleet-registration')}}" class="btn btn-success btn-md float-right">
                <i class="fa-fw fas fa-bus"></i> All Fleet
            </a>
        </div>

        <form role="form" method="POST" action="{{route('fleet-registration.update',$fleet)}}" name="editForm"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            {{method_field('put')}}

            <div class="card-body">
                <div class="form-row">
                    <div class="offset-md-1 col-md-9 mb-3">
                        @include('errors.error')
                    </div>
                </div>

                <div class="form-row">
                    <div class="offset-md-1 col-md-4 mb-3">
                        <label><strong>Registration No. <span class="error">*</span></strong></label>
                        <input type="text" name="reg_no" placeholder="Registration No" value="{{$fleet->reg_no}}"
                               class="form-control form-control-lg @if ($errors->has('reg_no'))  is-invalid @endif">
                    </div>
                    <div class="offset-md-1 col-md-4 mb-3">
                        <label><strong>Fleet Type <span class="error">*</span></strong></label>
                        <select name="fleet_type_id" class="form-control form-control-lg">
                            <option value="">Select Fleet Type</option>
                            @foreach($fleet_type as $data)
                                <option value="{{$data->id}}" @if($fleet->fleet_type_id == $data->id) selected @endif>{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="offset-md-1 col-md-4 mb-3">
                        <label><strong>Engine No.</strong></label>
                        <input type="text" name="engine_no" value="{{$fleet->engine_no}}" placeholder="Engine No"
                               class="form-control form-control-lg @if ($errors->has('engine_no')) is-invalid @endif">
                    </div>

                    <div class="offset-md-1 col-md-4 mb-3">
                        <label><strong>Model No.</strong></label>
                        <input type="text" name="model_no" placeholder="Model No" value="{{$fleet->model_no}}"
                               class="form-control form-control-lg @if ($errors->has('model_no'))  is-invalid @endif">
                    </div>
                </div>
                <div class="form-row">
                    <div class="offset-md-1 col-md-4 mb-3">
                        <label><strong>Chasis No.</strong></label>
                        <input type="text" name="chasis_no" placeholder="Chasis No" value="{{$fleet->chasis_no}}"
                               class="form-control form-control-lg  @if ($errors->has('chasis_no'))  is-invalid @endif">
                    </div>

                 



                    <div class="offset-md-1 col-md-4 mb-3">
                        <label><strong>Total seat No.</strong></label>
                        <input type="text" name="total_seat" id="seat" placeholder="Total Seat No." onkeyup="myFunction()" value="{{$fleet->total_seat}}"
                               class="form-control form-control-lg  @if ($errors->has('total_seat'))  is-invalid @endif">
                    </div>

                </div>
                

                <div class="form-row">
                    <div class="offset-md-1 col-md-9 mb-3">
                        <label><strong>Seat Number</strong></label>
                        <textarea name="seat_numbers" id="demo" class="form-control form-control-lg" placeholder="Seat Number">{{$fleet->seat_numbers}}</textarea>
                        <code>Use comma to separate the input</code>
                        @if ($errors->has('seat_numbers'))
                            <div class="invalid-feedback">{{ $errors->first('seat_numbers') }}</div>
                        @endif
                    </div>


                   




                    
                </div>

                <div class="form-row">
                    <div class="offset-md-1 col-md-4 mb-3">
                        <label><strong>Owner</strong></label>
                        <input type="text" name="owner" value="{{$fleet->owner}}"
                               class="form-control form-control-lg @if ($errors->has('owner')) is-invalid @endif" placeholder="Owner Name">
                    </div>

                    <div class="offset-md-1 col-md-4 mb-3">
                        <label><strong>Company Name</strong></label>
                        <input type="text" name="company" value="{{$fleet->company}}" class="form-control form-control-lg @if ($errors->has('company')) is-invalid @endif" placeholder="Company Name">
                    </div>
                </div>


                <div class="form-row">
                    <div class="offset-md-1 col-md-4 mb-3">
                        <label><strong>AC available</strong> </label>
                        <input type="checkbox" name="ac_available" @if($fleet->ac_available == 1) checked @endif data-toggle="toggle" data-on="Yes" data-off="No"
                               data-onstyle="success" data-offstyle="danger" data-width="100%">
                    </div>
                    <div class="offset-md-1 col-md-4 mb-3">
                        <label><strong>Status</strong></label>
                        <input type="checkbox" name="status"  @if($fleet->status == 1) checked @endif data-toggle="toggle" data-on="Active" data-off="DeActive"
                               data-onstyle="success" data-offstyle="danger" data-width="100%">
                    </div>

                </div>

            </div>
            <div class="card-footer bg-white">
                <button class="btn btn-success btn-block btn-lg" type="submit">Update</button>
            </div>

        </form>
    </div>


@endsection

@section('import-script')
    <script src="{{asset('assets/admin/token/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/admin/token/bootstrap-tokenfield.js')}}"></script>
@stop
@section('script')

    

    <script type="text/javascript">
        $(document).ready(function(){
            if($('#vip_plan').prop("checked") == true || $('#luxury_plan').prop("checked") == true ){
                
                $('#seat').prop('disabled', true);
                $('#seat').prop("required", false);
            }

            $('#vip_plan').click(function(){

                if($(this).prop("checked") == true){
                    $('#demo').val('A1 ,B2 ,B3 ,C4 ,C5 ,C6 ,');
                    
                    $('#seat').prop('disabled', true);
                    $('#seat').prop("required", false);
                }
                else{
                    $('#seat').prop('disabled', false);
                    $('#seat').prop("required", true);
                }
                
                $('#luxury_plan').prop("checked", false);

            });

            $('#luxury_plan').click(function(){
                
                if($(this).prop("checked") == true){
                    $('#demo').val('A1 ,B2 ,B3 ,B4 ,C5 ,C6 ,C7 ,D8 ,D9 ,D10 ,E11 ,E12 ,E13 ,');
                    $('#seat').prop('disabled', true);
                    $('#seat').prop("required", false);
                }
                else{
                    $('#seat').prop('disabled', false);
                    $('#seat').prop("required", true);
                }
                $('#vip_plan').prop("checked", false);
            });
        })
    </script>


@stop