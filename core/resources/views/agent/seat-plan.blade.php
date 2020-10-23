@extends('agent.layout.master')



@section('css')

    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/jquery.autocomplete.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/select2.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/flatpickr.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/admin-seat-custom.css')}}">

@stop

@section('body')

    @php

        $ticket = \App\TicketPrice::where('fleet_type_id',$tripAssign->fleetRegistration->fleet_type_id)->where('trip_route_id',$tripAssign->trip_route_id)->first();

        if($ticket){

          $ticketPrice = $ticket->price;

        }else{

        $ticketPrice = 0;

        }

        $bookArray = array_map('trim', explode(',', $booked_serial));

        $seatArray = array();

        $seatArray = array_map('trim', explode(',', $tripAssign->fleetRegistration->seat_numbers));



        $seatlayout= $tripAssign->fleetRegistration->layout;

        $layoutLastSeat= $tripAssign->fleetRegistration->lastseat;



        $data['seats'] = "";

        $rowSeat    = 1;

        $totalSeats = 1;

        $lastSeats  = ((sizeof($seatArray)>=3)?(sizeof($seatArray)-5):sizeof($seatArray));






if($seatlayout == '3-2'){
    
    array_pop($seatArray);

    foreach ($seatArray as $seat){

            if ($rowSeat == 1){

                $data['seats'] .= "<div class='row'>";

            }



            $data['seats'] .= "<div class='col-2'>

                                    <div class='".(in_array($seat, $bookArray)?("seat ladies"):("seat occupied ChooseSeat")).(($seat == 'M') ?  (" last-seat-32 "):(" "))."' data-item=''>

                                        <div class='seat-body'>

                                            $seat

                                            <span class='seat-handle-left'></span>

                                            <span class='seat-handle-right'></span>

                                            <span class='seat-bottom'></span>

                                        </div>

                                    </div>

                            </div> ";



            if ($rowSeat == 3){

                //adding a cental row

                if ((sizeof($seatArray)&0) == 2 && ($lastSeats == 0 || $lastSeats < $totalSeats)) {

                    continue;

                } else {

                    $data['seats'] .= "<div class='col-2'>&nbsp;</div>";

                }

            } else if ($rowSeat == 5 || $rowSeat == sizeof($seatArray)) {

                //ends of each row

                $data['seats'] .= "</div>";

                $rowSeat = 0;

            }

            $rowSeat++;

            $totalSeats++;

    }

 }else if($seatlayout == '2-3'){

    array_pop($seatArray);



    foreach ($seatArray as $seat){

            if ($rowSeat == 1){

                $data['seats'] .= "<div class='row'>";

            }



            $data['seats'] .= "<div class='col-2'>

                <div class='".(in_array($seat, $bookArray)?("seat ladies"):("seat occupied ChooseSeat")).(($seat == 'M') ?  (" last-seat-21 "):(" "))."' data-item=''>

                    <div class='seat-body'>

                        $seat

                        <span class='seat-handle-left'></span>

                        <span class='seat-handle-right'></span>

                        <span class='seat-bottom'></span>

                    </div>

                </div>

            </div>";



            if ($rowSeat == 2){

                //adding a cental row

                if ((sizeof($seatArray)&0) == 2 && ($lastSeats == 0 || $lastSeats < $totalSeats)) {

                    continue;

                } else {

                    $data['seats'] .= "<div class='col-2'>&nbsp;</div>";

                }

            } else if ($rowSeat == 5 || $rowSeat == sizeof($seatArray)) {

                //ends of each row

                $data['seats'] .= "</div>";

                $rowSeat = 0;

            }

            $rowSeat++;

            $totalSeats++;

    }

 }else if($seatlayout == '2-2'){

    array_pop($seatArray);

    foreach ($seatArray as $seat){



            if ($rowSeat == 1){

                $data['seats'] .= "<div class='row'>";

            }



            $data['seats'] .= "<div class='col-2'>

                                    <div class='".(in_array($seat, $bookArray)?("seat ladies"):("seat occupied ChooseSeat")). (($seat == 'M') ?  (" last-seat-21 "):(" "))."' data-item=''>

                                        <div class='seat-body'>

                                            $seat

                                            <span class='seat-handle-left'></span>

                                            <span class='seat-handle-right'></span>

                                            <span class='seat-bottom'></span>

                                        </div>

                                    </div>

                                </div>";



            if ($rowSeat == 2){

                //adding a cental row

                if ((sizeof($seatArray)&0) == 2 && ($lastSeats == 0 || $lastSeats < $totalSeats)) {

                    continue;

                } else {

                    $data['seats'] .= "<div class='col-2'>&nbsp;</div>";

                }

            } else if ($rowSeat == 4 || $rowSeat == sizeof($seatArray)) {

                //ends of each row

                $data['seats'] .= "</div>";

                $rowSeat = 0;

            }

            $rowSeat++;

            $totalSeats++;

    }

 }else if($seatlayout == '1-1'){

    array_pop($seatArray);

    foreach ($seatArray as $seat){



            if ($rowSeat == 1){

                $data['seats'] .= "<div class='row'>";

            }



            $data['seats'] .= "<div class='col-2'>

                                    <div class='".(in_array($seat, $bookArray)?("seat  ladies"):("seat occupied ChooseSeat")). (($seat == 'M') ?  (" last-seat-11 "):(" "))."' data-item=''>

                                        <div class='seat-body'>

                                            $seat

                                            <span class='seat-handle-left'></span>

                                            <span class='seat-handle-right'></span>

                                            <span class='seat-bottom'></span>

                                        </div>

                                    </div>

                               </div>";



            if ($rowSeat == 1)

            {

                //adding a cental row

                if ((sizeof($seatArray)&0) == 2 && ($lastSeats == 0 || $lastSeats < $totalSeats)) {

                    continue;

                } else {

                    $data['seats'] .= "<div class='col-2'>&nbsp;</div>";

                }

            } else if ($rowSeat == 2 || $rowSeat == sizeof($seatArray)) {

                //ends of each row

                $data['seats'] .= "</div>";

                $rowSeat = 0;

            }

            $rowSeat++;

            $totalSeats++;

    }

 }else if($seatlayout == '2-1'){

     array_pop($seatArray);



    foreach ($seatArray as $seat){

            if ($rowSeat == 1){

                $data['seats'] .= "<div class='row'>";

            }



            $data['seats'] .= "<div class='col-2'>

                <div class='".(in_array($seat, $bookArray)?("seat ladies "):("seat occupied ChooseSeat ")).  (($seat == 'M') ?  (" last-seat-21 "):(" ")). "' data-item=''>

                <div class='seat-body'>

                    $seat

                    <span class='seat-handle-left'></span>

                    <span class='seat-handle-right'></span>

                    <span class='seat-bottom'></span>

                </div>

                </div>

            </div>";



            if ($rowSeat == 2)

            {

                //adding a cental row

                if ((sizeof($seatArray)&0) == 2 && ($lastSeats == 0 || $lastSeats < $totalSeats)) {

                    continue;

                }else{

                    $data['seats'] .= "<div class='col-2'>&nbsp;</div>";

                }

            } else if ($rowSeat == 3 || $rowSeat == sizeof($seatArray)) {

                //ends of each row

                $data['seats'] .= "</div>";

                $rowSeat = 0;

            }



            $rowSeat++;

            $totalSeats++;

    }

 }else if($seatlayout == '1-2'){

    array_pop($seatArray);

    foreach ($seatArray as $seat){

            if ($rowSeat == 1){

                $data['seats'] .= "<div class='row'>";

            }



            $data['seats'] .= "<div class='col-2 col-xs-12'>

                <div class='".(in_array($seat, $bookArray)?("seat ladies"):("seat occupied ChooseSeat")). (($seat == 'M') ?  (" last-seat-12 "):(" ")). "' data-item=''>

                    <div class='seat-body'>

                        $seat

                        <span class='seat-handle-left'></span>

                        <span class='seat-handle-right'></span>

                        <span class='seat-bottom'></span>

                    </div>

                </div>

            </div> ";



            if ($rowSeat == 1){

                //adding a cental row

                if ((sizeof($seatArray)&0) == 2 && ($lastSeats == 0 || $lastSeats < $totalSeats)) {

                    continue;

                }else{

                    $data['seats'] .= "<div class='col-2'>&nbsp;</div>";

                }

            } else if ($rowSeat == 3 || $rowSeat == sizeof($seatArray)) {

                //ends of each row

                $data['seats'] .= "</div>";

                $rowSeat = 0;

            }

            $rowSeat++;

            $totalSeats++;

    }

 }else{

    foreach ($seatArray as $seat){

        array_pop($seatArray);



            if ($rowSeat == 1){

                $data['seats'] .= "<div class='row'>";

            }



            $data['seats'] .= "<div class='col-2'>

                                    <div class='".(in_array($seat, $bookArray)?("seat ladies last-seat"):("seat occupied ChooseSeat last-seat")).  " ' data-item=''>

                                        <div class='seat-body'>

                                            $seat

                                            <span class='seat-handle-left'></span>

                                            <span class='seat-handle-right'></span>

                                            <span class='seat-bottom'></span>

                                        </div>

                                    </div>

                                </div>";



            if ($rowSeat == 1){

                //adding a cental row

                if ((sizeof($seatArray)&0) == 2 && ($lastSeats == 0 || $lastSeats < $totalSeats)) {

                    continue;

                } else {

                    $data['seats'] .= "<div class='col-2'>&nbsp;</div>";

                }

            }else if ($rowSeat == 3 || $rowSeat == sizeof($seatArray)) {

                //ends of each row

                $data['seats'] .= "</div>";

                $rowSeat = 0;

            }

            $rowSeat++;

            $totalSeats++;

    }

 }

    @endphp





















    <div class="card">

        <div class="card-header">

            <a href="javascript:void(0)" onclick="myFunction()" class="btn btn-success float-right"> <i class="fas fa-spinner"></i> Refresh</a>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-12 text-center">

                    @if($tripAssign->fleetRegistration->company != null)

                        <h4>{{$tripAssign->fleetRegistration->company}}</h4>

                        <div class="margin-bottom-10"></div>

                    @endif

                    @if($tripAssign->fleetRegistration->owner != null)

                        <h6>{{$tripAssign->fleetRegistration->owner}}</h6>

                        <div class="margin-bottom-10"></div>

                    @endif



                    @if($tripAssign->tripRoute->name != null)

                        <p><strong><span class="text-danger">Route Name:</span> {{$tripAssign->tripRoute->name}}

                            </strong></p>

                        <div class="margin-bottom-10"></div>

                    @endif



                    <p>Dep Time: {{date('h:s A',strtotime($tripAssign->start_date))}} <span

                                class="text-success">({{date('d M Y',strtotime($tripAssign->start_date))}})</span></p>

                    <div class="margin-bottom-5"></div>

                    <strong>Total Seat: {{$tripAssign->fleetRegistration->total_seat}}</strong>

                    <div class="margin-bottom-5"></div>

                    <strong>Ticket Price : {{$ticketPrice}} {{$basic->currency}}</strong>

                </div>

            </div>





            <div class="row m-5">

                <div class="offset-md-1 col-md-5 col-sm-10 ">

                    <div class="row text-center">

                        <div class="col-md-4 col-sm-4">

                            <div class="seat  ">

                                <div class='seat-body'>

                                    <span class='seat-handle-left'></span>

                                    <span class='seat-handle-right'></span>

                                    <span class='seat-bottom'></span>

                                </div>

                            </div>

                            <p>Available Seat</p>

                        </div>

                        <div class="col-md-4 col-sm-4">

                            <div class="seat ChooseSeat selected ">

                                <div class='seat-body'>

                                    <span class='seat-handle-left'></span>

                                    <span class='seat-handle-right'></span>

                                    <span class='seat-bottom'></span>

                                </div>

                            </div>

                            <p>Selected Seat</p>

                        </div>





                        <div class="col-md-4 col-sm-4">

                            <div class="seat ladies last-seat seat occupied ChooseSeat ">

                                <div class='seat-body'>

                                    <span class='seat-handle-left'></span>

                                    <span class='seat-handle-right'></span>

                                    <span class='seat-bottom'></span>

                                </div>

                            </div>

                            <p>Booked Seat</p>

                        </div>

                    </div>

                    <div class="margin-bottom-40"></div>



                    <div class="all-seats">

                        @php

                            $seatArray = array();

                            $seatArray = array_map('trim', explode(',', $tripAssign->fleetRegistration->seat_numbers));

                        @endphp

                        @if($seatlayout == 'vip')


                        <div class="row" >
                            <div class='col-2'>&nbsp;</div>
                            <div class='col-2'>&nbsp;</div>
                            <div class='col-2'>

                                    
                                    @if(in_array($seatArray[0],$bookArray))

                                    <div class="seat ladies" data-item=''>
                                    @else

                                    <div class="seat occupied ChooseSeat" data-item=''>

                                    @endif
                                


                                    <div class="seat-body">

                                        {{ $seatArray[0] }}
                                        
                                        <span class='seat-handle-left'></span>

                                        <span class='seat-handle-right'></span>

                                        <span class='seat-bottom'></span>

                                    </div>

                                </div>

                            </div>
                            
                        </div>
                        <br>
                        <div class="row" >
                            <div class='col-2'>

                                @if(in_array($seatArray[1],$bookArray))

                                    <div class="seat ladies" data-item=''>
                                @else

                                    <div class="seat occupied ChooseSeat" data-item=''>

                                @endif

                                    <div class='seat-body'>

                                        {{ $seatArray[1] }}

                                        <span class='seat-handle-left'></span>

                                        <span class='seat-handle-right'></span>

                                        <span class='seat-bottom'></span>

                                    </div>

                                </div>

                            </div>
                            <div class='col-2'>&nbsp;</div>
                            <div class='col-2'>

                                @if(in_array($seatArray[2],$bookArray))

                                    <div class="seat ladies" data-item=''>
                                @else

                                    <div class="seat occupied ChooseSeat" data-item=''>

                                @endif
                                    <div class='seat-body'>

                                        {{ $seatArray[2] }}

                                        <span class='seat-handle-left'></span>

                                        <span class='seat-handle-right'></span>

                                        <span class='seat-bottom'></span>

                                    </div>

                                </div>

                            </div>
                            
                        </div>
                        <br>
                        <div class="row" >
                            <div class='col-2'>

                                @if(in_array($seatArray[3],$bookArray))

                                    <div class="seat ladies" data-item=''>
                                @else

                                    <div class="seat occupied ChooseSeat" data-item=''>

                                @endif
                                    <div class='seat-body'>

                                        {{ $seatArray[3] }}

                                        <span class='seat-handle-left'></span>

                                        <span class='seat-handle-right'></span>

                                        <span class='seat-bottom'></span>

                                    </div>

                                </div>

                            </div>
                            <div class='col-2'>

                                @if(in_array($seatArray[4],$bookArray))

                                    <div class="seat ladies" data-item=''>
                                @else

                                    <div class="seat occupied ChooseSeat" data-item=''>

                                @endif
                                    <div class='seat-body'>

                                        {{ $seatArray[4] }}

                                        <span class='seat-handle-left'></span>

                                        <span class='seat-handle-right'></span>

                                        <span class='seat-bottom'></span>

                                    </div>

                                </div>

                            </div>
                            <div class='col-2'>

                                @if(in_array($seatArray[5],$bookArray))

                                    <div class="seat ladies" data-item=''>
                                @else

                                    <div class="seat occupied ChooseSeat" data-item=''>

                                @endif
                                    <div class='seat-body'>

                                        {{ $seatArray[5] }}

                                        <span class='seat-handle-left'></span>

                                        <span class='seat-handle-right'></span>

                                        <span class='seat-bottom'></span>

                                    </div>

                                </div>

                            </div>
                            
                        </div>

                        @elseif($seatlayout == 'luxury')

                        <div class="row" >
                            
                            <div class='col-2'>&nbsp;</div>
                            <div class='col-2'>&nbsp;</div>
                            <div class='col-2'>

                                

                                @if(in_array($seatArray[0],$bookArray))

                                    <div class="seat ladies" data-item=''>
                                @else

                                    <div class="seat occupied ChooseSeat" data-item=''>

                                @endif
                                


                                    <div class="seat-body">

                                        
                                        {{ $seatArray[0] }}
                                        <span class='seat-handle-left'></span>

                                        <span class='seat-handle-right'></span>

                                        <span class='seat-bottom'></span>

                                    </div>

                                </div>

                            </div>
                            
                        </div>
                        <br>
                        <div class="row" >
                            <div class='col-2'>

                                @if(in_array($seatArray[1],$bookArray))

                                    <div class="seat ladies" data-item=''>
                                @else

                                    <div class="seat occupied ChooseSeat" data-item=''>

                                @endif
                                    <div class='seat-body'>

                                        {{ $seatArray[1] }}

                                        <span class='seat-handle-left'></span>

                                        <span class='seat-handle-right'></span>

                                        <span class='seat-bottom'></span>

                                    </div>

                                </div>

                            </div>
                            <div class='col-2'>

                                @if(in_array($seatArray[2],$bookArray))

                                    <div class="seat ladies" data-item=''>
                                @else

                                    <div class="seat occupied ChooseSeat" data-item=''>

                                @endif
                                    <div class='seat-body'>

                                        {{ $seatArray[2] }}

                                        <span class='seat-handle-left'></span>

                                        <span class='seat-handle-right'></span>

                                        <span class='seat-bottom'></span>

                                    </div>

                                </div>

                            </div>
                            <div class='col-2'>

                                @if(in_array($seatArray[3],$bookArray))

                                    <div class="seat ladies" data-item=''>
                                @else

                                    <div class="seat occupied ChooseSeat" data-item=''>

                                @endif
                                    <div class='seat-body'>

                                        {{ $seatArray[3] }}

                                        <span class='seat-handle-left'></span>

                                        <span class='seat-handle-right'></span>

                                        <span class='seat-bottom'></span>

                                    </div>

                                </div>

                            </div>
                            
                            
                        </div>
                        <br>
                        <div class="row" >
                            <div class='col-2'>

                                @if(in_array($seatArray[4],$bookArray))

                                    <div class="seat ladies" data-item=''>
                                @else

                                    <div class="seat occupied ChooseSeat" data-item=''>

                                @endif
                                    <div class='seat-body'>

                                        {{ $seatArray[4] }}

                                        <span class='seat-handle-left'></span>

                                        <span class='seat-handle-right'></span>

                                        <span class='seat-bottom'></span>

                                    </div>

                                </div>

                            </div>
                            <div class='col-2'>

                                @if(in_array($seatArray[5],$bookArray))

                                    <div class="seat ladies" data-item=''>
                                @else

                                    <div class="seat occupied ChooseSeat" data-item=''>

                                @endif
                                    <div class='seat-body'>

                                        {{ $seatArray[5] }}

                                        <span class='seat-handle-left'></span>

                                        <span class='seat-handle-right'></span>

                                        <span class='seat-bottom'></span>

                                    </div>

                                </div>

                            </div>
                           
                            <div class='col-2'>

                                @if(in_array($seatArray[6],$bookArray))

                                    <div class="seat ladies" data-item=''>
                                @else

                                    <div class="seat occupied ChooseSeat" data-item=''>

                                @endif
                                    <div class='seat-body'>

                                        {{ $seatArray[6] }}

                                        <span class='seat-handle-left'></span>

                                        <span class='seat-handle-right'></span>

                                        <span class='seat-bottom'></span>

                                    </div>

                                </div>

                            </div>
                            
                        </div>
                        <br>
                        <div class="row" >
                            <div class='col-2'>

                                @if(in_array($seatArray[7],$bookArray))

                                    <div class="seat ladies" data-item=''>
                                @else

                                    <div class="seat occupied ChooseSeat" data-item=''>

                                @endif
                                    <div class='seat-body'>

                                        {{ $seatArray[7] }}

                                        <span class='seat-handle-left'></span>

                                        <span class='seat-handle-right'></span>

                                        <span class='seat-bottom'></span>

                                    </div>

                                </div>

                            </div>
                            <div class='col-2'>

                                @if(in_array($seatArray[8],$bookArray))

                                    <div class="seat ladies" data-item=''>
                                @else

                                    <div class="seat occupied ChooseSeat" data-item=''>

                                @endif
                                    <div class='seat-body'>

                                        {{ $seatArray[8] }}

                                        <span class='seat-handle-left'></span>

                                        <span class='seat-handle-right'></span>

                                        <span class='seat-bottom'></span>

                                    </div>

                                </div>

                            </div>
                            
                            <div class='col-2'>

                                @if(in_array($seatArray[9],$bookArray))

                                    <div class="seat ladies" data-item=''>
                                @else

                                    <div class="seat occupied ChooseSeat" data-item=''>

                                @endif
                                    <div class='seat-body'>

                                        {{ $seatArray[9] }}

                                        <span class='seat-handle-left'></span>

                                        <span class='seat-handle-right'></span>

                                        <span class='seat-bottom'></span>

                                    </div>

                                </div>

                            </div>
                            
                        </div>
                        <br>
                        <div class="row" >
                            <div class='col-2'>

                                @if(in_array($seatArray[10],$bookArray))

                                    <div class="seat ladies" data-item=''>
                                @else

                                    <div class="seat occupied ChooseSeat" data-item=''>

                                @endif
                                    <div class='seat-body'>

                                        {{ $seatArray[10] }}

                                        <span class='seat-handle-left'></span>

                                        <span class='seat-handle-right'></span>

                                        <span class='seat-bottom'></span>

                                    </div>

                                </div>

                            </div>
                            <div class='col-2'>

                                @if(in_array($seatArray[11],$bookArray))

                                    <div class="seat ladies" data-item=''>
                                @else

                                    <div class="seat occupied ChooseSeat" data-item=''>

                                @endif
                                    <div class='seat-body'>

                                        {{ $seatArray[11] }}

                                        <span class='seat-handle-left'></span>

                                        <span class='seat-handle-right'></span>

                                        <span class='seat-bottom'></span>

                                    </div>

                                </div>

                            </div>
                            <div class='col-2'>

                               @if(in_array($seatArray[12],$bookArray))

                                    <div class="seat ladies" data-item=''>
                                @else

                                    <div class="seat occupied ChooseSeat" data-item=''>

                                @endif
                                    <div class='seat-body'>

                                        {{ $seatArray[12] }}

                                        <span class='seat-handle-left'></span>

                                        <span class='seat-handle-right'></span>

                                        <span class='seat-bottom'></span>

                                    </div>

                                </div>

                            </div>
                            
                            
                        </div>



                        @else

                        {!! $data['seats'] !!}

                        @endif
                    </div>

                </div>



                @if(in_array('M', $seatArray))

            </div>

            @endif





            <div class="col-md-6 col-sm-12">



                <form action="" class="price-details" id="bookingFrm" method="post" accept-charset="utf-8">

                    @csrf

                    <div class="form-group">

                        <label><strong>Choose Boarding Point <span class="text-danger">*</span></strong></label>

                        <select name="boarding" id="stoppage" class="form-control form-control-lg boarding_point">

                            <option value="">Boarding Point</option>

                            @foreach($stoppage as $board)

                            <option value="{{$board}}">{{$board}}</option>

                            @endforeach

                        </select>

                    </div>





                    <div class="form-group">

                        <label><strong>Name <span class="text-danger">*</span></strong></label>

                            <input type="text" name="passenger_name"  value="{{old('passenger_name')}}" class="form-control form-control-lg" placeholder="Enter Name" autocomplete="off">

                    </div>





                    <div class="form-group">

                        <label><strong>E-Mail</strong> </label>

                            <input type="text" name="email" value="{{old('email')}}" class="form-control form-control-lg " placeholder="Enter E-mail" autocomplete="off" >



                    </div>





                    <div class="form-group">

                        <label><strong>Mobile <span class="text-danger">*</span></strong></label>

                        <input type="text" name="phone"  value="{{old('phone')}}" class="form-control form-control-lg" placeholder="Enter Mobile No." autocomplete="off">

                    </div>




                    <div class="form-group">

                        <label><strong>Next of Kin Name <span class="text-danger">*</span></strong></label>

                        <input type="text" name="kin_name"  value="{{old('kin_name')}}" class="form-control form-control-lg" placeholder="Enter Next of Kin Name" autocomplete="off">

                    </div>



                    <div class="form-group">

                        <label><strong>Next of Kin Phone <span class="text-danger">*</span></strong></label>

                        <input type="text" name="kin_phone"  value="{{old('kin_phone')}}" class="form-control form-control-lg" placeholder="Enter Next of Kin Phone" autocomplete="off">

                    </div>











                    @if($tripAssign->fleetRegistration->fleet_facilities != null)

                        <div class="form-group">

                            <h4> Facilities</h4>

                            <div id="facilities">

                                @php

                                    $facilities = array_map('trim', explode(',', $tripAssign->fleetRegistration->fleet_facilities));

                                @endphp

                                @foreach($facilities as $val)

                                    <div class="funkyradio">

                                        <div class="funkyradio-default">

                                            <input type="radio" checked/>

                                            <label>{{$val}}</label>

                                        </div>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    @endif



                    <div class="table-responsive ">

                        <table class="table table table-bordered table-striped">

                            <tbody>

                            <tr>

                                <td class="text-right" style="width: 30%;">Seat(s)</td>

                                <th id="seatPreview">---</th>

                            </tr>

                            <tr>

                                <td class="text-right"><b> Total</b></td>

                                <th id="grandTotalPreview">0</th>

                            </tr>

                            </tbody>

                        </table>



                        <input type="hidden" name="trip_route_id" value="{{$tripAssign->trip_route_id}}">

                        <input type="hidden" name="fleet_registration_id"

                               value="{{$tripAssign->fleet_registration_id}}">

                        <input type="hidden" name="trip_id_no" value="{{$tripAssign->id}}">

                        <input type="hidden" name="id_no" value="{{$tripAssign->id_no}}">

                        <input type="hidden" name="fleet_type_id"

                               value="{{$tripAssign->fleetRegistration->fleet_type_id}}">

                        <input type="hidden" name="total_seat">

                        <input type="hidden" name="seat_number">

                        <input type="hidden" name="price" value="{{$ticketPrice}}">

                        <input type="hidden" name="total_fare">

                        <input type="hidden" name="booking_date" value="{{$tripAssign->start_date}}">



                    </div>

                    <button id="submit-btn" class="btn btn-block">Continue</button>

                </form>



                @if(in_array('M', $seatArray))



                @else

            </div>

            @endif







        </div>

    </div>







@stop





@section('script')

    <script src="{{asset('assets/front/js/jquery.autocomplete.js')}}"></script>

    <script src="{{asset('assets/admin/js/select2.min.js')}}"></script>

    <script src="{{asset('assets/front/js/flatpickr.js')}}"></script>



    <script>

        function myFunction() {

            location.reload();

        }

        $(document).ready(function () {

            $('.boarding_point').select2();

            /*

            *------------------------------------------------------

            * @function: findBookingInformation()

            * @return  : location, facilities, seatsList

            *------------------------------------------------------

            */

            var total_seat = $('input[name=total_seat]');

            var total_fare = $('input[name=total_fare]');

            var seat_number = $('input[name=seat_number]');



            var price = $('input[name=price]').val();

            var booking_date = $('input[name=booking_date]');



            var passenger_name = $('input[name=passenger_name]').val();

            var phone = $('input[name=phone]').val();



            var seatPreview = $('#seatPreview');

            var pricePreview = $('#pricePreview');

            var grandTotalPreview = $('#grandTotalPreview');

            var outputPreview = $('#outputPreview');



             if (total_seat.val() == '') {

                 $("#submit-btn").attr('disabled', true);

             }



            /*

            *------------------------------------------------------

            * Choose seat(s)

            * @function: findPriceBySeat

            * @return : selected seat(s), price and group price

            *------------------------------------------------------

            */



            $('body').on('click', '.ChooseSeat', function () {

                var seat = $(this);

                if (seat.attr('data-item') != "selected") {

                    seat.removeClass('occupied').addClass('selected').attr('data-item', 'selected');

                } else if (seat.attr('data-item') == "selected") {

                    seat.removeClass('selected').addClass('occupied').attr('data-item', '');

                }

                //reset seat serial for each click

                var seatSerial = "";

                var countSeats = 0;



                $("div[data-item=selected]").each(function (i, x) {

                    countSeats = i + 1;

                    seatSerial += $(this).text().trim() + ", ";

                });



                total_fare.val(countSeats * price);

                $("#grandTotalPreview").text((countSeats * price) + " {{$basic->currency}}");

                total_seat.val(countSeats);

                seat_number.val(seatSerial);

                seatPreview.html(seatSerial);



                if (countSeats > 0) {

                    $("#submit-btn").attr('disabled', false);

                } else {

                    $("#submit-btn").attr('disabled', true);

                }

            });





            $(document).on('click', "#submit-btn", function (e) {
                

                e.preventDefault();

                var boarding = $("#select2-stoppage-container").text();

                


                var trip_route_id = $("input[name=trip_route_id]").val();

                var fleet_registration_id = $("input[name=fleet_registration_id]").val();

                var trip_assign_id_no = $("input[name=trip_id_no]").val();

                var id_no = $("input[name=id_no]").val();

                var fleet_type_id = $("input[name=fleet_type_id]").val();

                var total_seat = $("input[name=total_seat]").val();

                var seat_number = $("input[name=seat_number]").val();

                var price = $("input[name=price]").val();

                var total_fare = $("input[name=total_fare]").val();

                var booking_date = $("input[name=booking_date]").val();



                var passenger_name = $('input[name=passenger_name]').val();

                var phone = $('input[name=phone]').val();

                var email = $('input[name=email]').val();

                var kin_name = $('input[name=kin_name]').val();

                var kin_phone = $('input[name=kin_phone]').val(); 


                if(passenger_name == ''){

                    toastr.error("Please Enter Passenger Name");

                }else if(phone == ''){

                    toastr.error("Please Enter Phone Number");

                }else if(kin_name == ''){

                    toastr.error("Please Enter Kin Namer");

                }else if(kin_phone == ''){

                    toastr.error("Please Enter Kin Phone");

                }else{

                       $.ajax({

                           type: "post",

                           url: "{{route('agent.checked-seat')}}",

                            //contentType: false,

                            //processData: false,

                            data: {

                                boarding: boarding,

                                trip_route_id: trip_route_id,

                                fleet_registration_id: fleet_registration_id,

                                trip_assign_id_no: trip_assign_id_no,

                                id_no: id_no,

                                fleet_type_id: fleet_type_id,

                                total_seat: total_seat,

                                seat_number: seat_number,

                                price: price,

                                total_fare: total_fare,

                                booking_date: booking_date,

                                passenger_name: passenger_name,

                                email: email,

                                phone: phone,

                                kin_name: kin_name,

                                kin_phone: kin_phone,

                            }, 



                            success: function (data) {

                                console.log(data)

                                if (data.status == "insufficient") {

                                    toastr.error(data.arr);

                                }

                                if (data.status == 1000) {

                                    toastr.error(data.arr + " Seat Booked Yet. <br> Please select another seat");

                                }

                                if (data.pnr) {

                                    toastr.success("Ticket Buy successfully");

                                    window.location.href =  data.pnr;

                                }

                            },



                            error: function (res) {

                                //console.log(res);

                            }

                       });



                }

            });

        });

    </script>

@stop