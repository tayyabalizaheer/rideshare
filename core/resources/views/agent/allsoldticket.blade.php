@extends('agent.layout.master')

@section('body')
<h2 class="text-center"> All Sold Ticket</h2>
<div class="main-container" id="main-container">
    <div class="main-content"> 
     	<table class="table table-striped table-bordered table-hover" id="emp_list">
             <thead>
                <tr>
                    <th>Passenger_name</th>
                    <th>Kin Name</th>
                    <th>Kin Phone</th>
                    <th>PNR</th>
                    <th>Mobile NO</th>
                    <th>Price</th>
                    <th>Total Seats</th>
                    <th>Total Fare</th>
                    <th>Start Point</th>
                    <th>End Point</th>
                    <th>Booking Date</th>
                    
                    
                </tr>
            </thead>
            <tbody>
              @foreach($allbookingdata as $bookingdata)
                  <tr>
                      <td onclick="sortTable(0)">{{$bookingdata->passenger_name}}</td>
                      <td onclick="sortTable(1)">{{$bookingdata->next_of_kin_name}}</td>
                      <td onclick="sortTable(2)">{{$bookingdata->next_of_kin_phone}}</td>
                        <td onclick="sortTable(2)">{{$bookingdata->pnr}}</td>
                        <td onclick="sortTable(3)">{{$bookingdata->phone}}</td>
                        <td onclick="sortTable(4)">{{$bookingdata->price}}</td>
                        <td onclick="sortTable(5)">{{$bookingdata->total_seat}}</td>
                        <td onclick="sortTable(6)">{{$bookingdata->total_fare}}</td>
                        <td onclick="sortTable(7)">{{$bookingdata->start_point_name}}</td>
                        <td onclick="sortTable(8)">{{$bookingdata->end_point_name}}</td>
                        <td onclick="sortTable(9)">{{$bookingdata->booking_date}}
                         <a href="{{route('agent.trip-date.change',$bookingdata->id)}}" class="btn btn-info  btn-icon btn-pill" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                        </a>
                        </td>

	                    
	                    
	                </tr>
	            	@endforeach
            </tbody>
        </table> 
    </div>
</div>
@endsection
@section('script')
<script>
function sortTable(val) {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("emp_list");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[val];
      y = rows[i + 1].getElementsByTagName("TD")[val];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
</script>

@stop