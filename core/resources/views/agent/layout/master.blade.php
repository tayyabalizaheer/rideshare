<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{asset('assets/images/logo/favicon.png')}}" />

    <title>{{$basic->sitename}} | {{$page_title}}</title>
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css')}}">
    
    <link rel="stylesheet" href="{{asset('assets/admin/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootadmin.min.css')}}">
    <link href="{{asset('assets/admin/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
    @yield('import-css')
    <link href="{{asset('assets/admin/css/toastr.min.css')}}" rel="stylesheet" />

    <link href="{{asset('assets/admin/css/sweetalert.css')}}"  rel="stylesheet">
    <link href="{{asset('assets/admin/css/table.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/admin/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" media="print" href="{{asset('assets/admin/css/print.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
    @yield('css')
</head>
<body class="bg-light">

<nav class="navbar navbar-expand navbar-dark bg-primary">
    <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="{{url('/')}}">{{$basic->sitename}}</a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <strong class="text-white" style=" margin-right: 20px;margin-top: 8px;float: left;">Balance: {{number_format(Auth::guard('agent')->user()->balance, $basic->decimal)}} {{$basic->currency}}</strong>
            </li>
            <li class="nav-item dropdown">
                <a href="#" id="dd_user" class="nav-link dropdown-toggle" data-toggle="dropdown"><i
                            class="fa fa-user"></i> {{Auth::guard('agent')->user()->username}}</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                    <a class="dropdown-item" href="{{route('agent.changePass')}}"> Password Settings</a>
                    <a class="dropdown-item" href="{{route('agent.profile')}}"> Profile</a>
                    <a class="dropdown-item" href="{{route('agent.logout')}}"> Logout</a>


                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="d-flex">
    @include('agent.layout.sidebar')

    <div class="content p-4">
        @yield('body')


    </div>
</div>



<script src="{{asset('assets/admin/')}}/js/jquery.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/admin/js/bootstrap-toggle.min.js')}}"></script>



@yield('import-script')
<script src="{{asset('assets/admin/')}}/js/moment.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/bootadmin.min.js"></script>


<script src="{{asset('assets/admin/js/toastr.min.js')}}" ></script>
<script src="{{asset('assets/admin/js/sweetalert.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
@yield('script')
@if (session('success'))
    <script type="text/javascript">
        $(document).ready(function () {
            swal("Success!", "{{ session('success') }}", "success");
        });
        
    </script>
    
@endif

@if (session('alert'))
    <script type="text/javascript">
        $(document).ready(function () {
            swal("Sorry!", "{{ session('alert') }}", "error");
        });
    </script>
@endif
<script type="text/javascript">
            @if(Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}";
    switch (type) {
        case 'info':
            toastr.info("{{Session::get('message')}}");
            break;
        case 'warning':
            toastr.warning("{{Session::get('message')}}");
            break;
        case 'success':
            toastr.success("{{Session::get('message')}}");
            break;
        case 'error':
            toastr.error("{{Session::get('message')}}");
            break;
    }
    @endif
</script>
<script >
    $(function() {
            $('#emp_list').DataTable();
        });
</script>

</body>
</html>