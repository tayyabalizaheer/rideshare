

<div class="sidebar sidebar-dark bg-dark">

    <ul class="list-unstyled">



        <li class="@if(request()->is('agent/dashboard')) @endif"><a href="{{route('agent.dashboard')}}"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a></li>

        <li class="@if(request()->is('agent/trip-manage')) active @endif"><a href="{{route('agent.tripFind')}}"><i class="fa-fw  fa fa-road"></i> Trip Search</a></li>

        <li class="@if(request()->is('agent/ticket-log')) active @endif"><a href="{{route('agent.ticketlog')}}"><i class="fa-fw  fa fa-road"></i> Ticket Log</a></li>
        <li class="@if(request()->is('agent/all-bookings')) active @endif"><a href="{{route('agent.allbookings')}}"><i class="fa-fw  fa fa-road"></i> All Bookings</a></li>

        <li class="@if(request()->is('agent/all-soldticket')) active @endif"><a href="{{route('agent.all-soldticket')}}"><i class="fa-fw  fa fa-road"></i> All Sold Ticket</a></li>


        



    </ul>

</div>