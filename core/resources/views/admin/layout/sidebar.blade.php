

<div class="sidebar sidebar-dark bg-dark">

    <ul class="list-unstyled">



        <li class="{{ request()->path() == 'admin/dashboard' ? 'active' : '' }}"><a href="{{route('admin.dashboard')}}"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a></li>

        

        <li class="{{ request()->path() == 'admin/enquiry/' ? 'active' : '' }}"><a href="{{route('enquiry.index')}}"><i class="fa fa-fw fa-question-circle"></i> Manage Enquiry</a></li>





        <li>

            <a href="#sm_blog" data-toggle="collapse">

                <i class="fa-fw fas fa-bus"></i> Vehical Management

            </a>

            <ul id="sm_blog" class="list-unstyled collapse

                @if(request()->path() == 'admin/fleet-type') show

                @elseif(request()->path() == 'admin/fleet-facility') show

                @elseif(request()->path() == 'admin/fleet-registration') show

                @elseif(request()->path() == 'admin/fleet-registration/create') show

                @endif">

                <li  class="@if(request()->path() == 'admin/fleet-type') active @endif"><a href="{{route('fleet-type')}}">Vehical Type</a></li>

                

                <li class="@if(request()->path() == 'admin/fleet-registration') active

                    @elseif(request()->path() == 'admin/fleet-registration/create') active

                            @endif"><a href="{{route('fleet-registration')}}">Vehical Registration</a></li>

            </ul>

        </li>





        <li class="@if(request()->path() == 'admin/manage-location') active @endif">

            <a href="{{route('manage-location')}}">

                <i class="fa-fw  fa fa-road"></i> Location Management

            </a>


        </li>



        
         <li class="@if(request()->is('admin/all-bookings')) active @endif"><a href="{{route('allbookings')}}"><i class="fa fa-fw fa-ticket-alt"></i>All Bookings</a></li>


        





        <li>

            <a href="#sm_users" data-toggle="collapse">

                <i class="fa fa-fw fa-users"></i> Manage User

            </a>

            <ul id="sm_users" class="list-unstyled collapse @if(request()->path() == 'admin/users')  show

                @elseif(request()->is('admin/user-banned'))  show

                @elseif(request()->is('admin/user-document'))  show

                @elseif(request()->is('admin/mail/*'))  show

                @elseif(request()->is('admin/user/*'))  show

                @elseif(request()->is('admin/user-transaction/*'))  show

                @elseif(request()->is('admin/user-deposit/*'))  show

                @elseif(request()->is('admin/user-withdraw/*'))  show

                @elseif(request()->is('admin/user-login-history/*'))  show

                @elseif(request()->is('admin/user-search*'))  show

                        @endif">

                <li class="@if(request()->is('admin/users')) active @endif"><a href="{{route('users')}}"><i class="icon fa fa-user"></i> Users</a></li>

                <li class="@if(request()->is('admin/user-banned')) active @endif"><a href="{{route('user.ban')}}" ><i class="icon fa fa-ban"></i> Banned User</a></li>

            </ul>

        </li>







        <li>

            <a href="#sm_deposit" data-toggle="collapse">

                <i class="fa fa-fw fa-credit-card"></i> Manage Deposit

            </a>

            <ul id="sm_deposit" class="list-unstyled collapse

                @if(request()->is('admin/deposits')) show

                @elseif(request()->is('admin/gateway')) show

                 @elseif(request()->is('admin/gateway/*'))  show

                @endif">

                <li class="@if(request()->is('admin/deposits')) active @endif"><a href="{{route('deposits')}}"><i class="icon fa fa-credit-card"></i> Deposit Log</a></li>

                <li class="@if(request()->is('admin/gateway')) active @endif"><a href="{{route('gateway')}}"><i class="icon fa fa-credit-card"></i> Deposit Method</a></li>

            </ul>

        </li>





        <li>

            <a href="#sm_withdraw" data-toggle="collapse">

                <i class="fa fa-fw fa-money-bill-alt"></i> Manage Withdraw

            </a>

            <ul id="sm_withdraw" class="list-unstyled collapse @if(request()->path() == 'admin/withdraw') show

                @elseif(request()->path() == 'admin/withdraw/requests') show

                @elseif(request()->path() == 'admin/withdraw/approved') show

                @elseif(request()->path() == 'admin/withdraw/refunded') show

                @endif ">



                <li class="@if(request()->path() == 'admin/withdraw/requests') active @endif"><a href="{{route('withdraw.requests')}}"><i class="icon fa fa-money-bill-alt"></i> Withdraw Request</a></li>

                <li class="@if(request()->path() == 'admin/withdraw/approved') active @endif"><a href="{{route('withdraw.approved')}}"><i class="icon fa fa-money-bill-alt"></i> Withdraw Approved</a></li>

                <li class="@if(request()->path() == 'admin/withdraw/refunded') active @endif"><a href="{{route('withdraw.refunded')}}"><i class="icon fa fa-money-bill-alt"></i> Withdraw Refunded</a></li>

                <li class="@if(request()->path() == 'admin/withdraw') active @endif"><a href="{{route('withdraw')}}"><i class="icon fa fa-money-bill-alt"></i> Withdraw Method</a></li>

            </ul>

        </li>



        <li class="@if(request()->is('admin/subscribers')) active @elseif(request()->is('admin/send-email')) active @endif">

            <a href="{{route('manage.subscribers')}}"><i class="fa fa-fw fa-thumbs-up"></i> All Subscribers</a>

        </li>











        <li>

            <a href="#blog_menu" data-toggle="collapse"><i class="fa fa-fw fa-newspaper"></i> Manage Blog</a>

            <ul id="blog_menu" class="list-unstyled collapse @if(request()->path() == 'admin/blog-category') show @elseif(request()->path() == 'admin/blog') show @endif">



                <li class="@if(request()->path() == 'admin/blog-category') active @endif"><a href="{{route('admin.cat')}}"> Blog Category </a></li>

                <li class="@if(request()->path() == 'admin/blog') active @endif"><a href="{{route('admin.blog')}}"> Manage Blog</a></li>

            </ul>

        </li>







        <li>

            <a href="#sm_webcontrol" data-toggle="collapse">

                <i class="fa fa-fw fa-bars"></i> Website Control

            </a>

            <ul id="sm_webcontrol" class="list-unstyled collapse @if(request()->path() == 'admin/general-settings') show

                                @elseif(request()->path() == 'admin/template') show

                                @elseif(request()->path() == 'admin/sms-api') show

                                @elseif(request()->path() == 'admin/contact-setting') show


                            @endif">



                <li class="@if(request()->path() == 'admin/general-settings') active @endif"><a href="{{route('admin.GenSetting')}}"><i class="icon fa fa-cogs"></i> General Setting </a></li>

               
                <li class="@if(request()->path() == 'admin/contact-setting') active @endif"><a href="{{route('contact-setting')}}"><i class="icon fa fa-phone"></i> Contact Setting </a></li>

            </ul>

        </li>







        <li>

            <a href="#sm_interfacecontrol" data-toggle="collapse">

                <i class="fa fa-fw fa-desktop"></i> Interface Control

            </a>

            <ul id="sm_interfacecontrol" class="list-unstyled collapse @if(request()->path() == 'admin/manage-logo') show

                                @elseif(request()->path() == 'admin/manage-text') show

                                @elseif(request()->path() == 'admin/manage-social') show

                                @elseif(request()->path() == 'admin/manage-about') show

                                @elseif(request()->path() == 'admin/manage-terms') show

                                @elseif(request()->path() == 'admin/manage-privacy') show

                                @elseif(request()->path() == 'admin/faqs-create') show

                                @elseif(request()->path() == 'admin/faqs-all') show

                                @elseif(request()->is('admin/tour/edit/*')) show

                                @elseif(request()->is('admin/tour/create')) show

                                @elseif(request()->is('admin/tour')) show


                                @elseif(request()->is('admin/mange-breadcrumb')) show



                                @elseif(request()->is('admin/destination')) show

                                @elseif(request()->is('admin/destination/create')) show

                                @elseif(request()->is('admin/destination/edit/*')) show

                            @endif">





                <li class="@if(request()->path() == 'admin/manage-logo') active @endif"><a href="{{route('manage-logo')}}"><i class="icon fa fa-photo"></i> Logo & favicon </a></li>

                <li class="@if(request()->path() == 'admin/mange-breadcrumb') active @endif"><a href="{{route('mange-breadcrumb')}}"><i class="icon fa fa-photo"></i> Mange Breadcrumb </a></li>

                <li class=" @if(request()->path() == 'admin/manage-text') active @endif"><a href="{{route('manage-footer')}}"><i class="icon fa fa-file-text"></i> Manage  Text </a></li>

                

                <li class="@if(request()->path() == 'admin/manage-about') active @endif"><a href="{{route('manage-about')}}"><i class="icon fa fa-info-circle"></i> Manage About </a></li>

                <li class="@if(request()->path() == 'admin/faqs-create') active @endif"><a href="{{route('faqs-create')}}"><i class="icon fa fa-plus"></i> New Faq </a></li>

                <li class="@if(request()->path() == 'admin/faqs-all') active @endif"><a href="{{route('faqs-all')}}"><i class="icon fa fa-question"></i> Manage Faqs </a></li>



                <li class="@if(request()->path() == 'admin/slider') active @endif"><a href="{{route('slider')}}"><i class="icon fa fa-image"></i> Manage Slider </a></li>

                

                <li class="@if(request()->is('admin/tour')) active @endif"><a href="{{route('admin.tour')}}"><i class="icon fa fa-bus"></i> Popular Tour </a></li>

                <li class="@if(request()->is('admin/destination')) active @endif"><a href="{{route('admin.destination')}}"><i class="icon fa fa-location-arrow"></i> Popular Destination </a></li>

            </ul>

        </li>







    </ul>

</div>