<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$page_title}} | {{$basic->sitename}}</title>

    <link rel="icon" type="image/png" href="{{asset('assets/images/logo/favicon.png')}}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/agent-form.css') }}">

    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-notify.min.js') }}"></script>
</head>
<body>

<div style="text-align: center;">

<img src="{{asset('assets/images/logo/logo.png')}}" style="max-width: 220px; margin-top: 160px;">
</div>
    
<div class="box">
        <h1>Agent Login </h1>

    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('error') }}
        </div>
    @elseif(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('success') }}
        </div>
    @elseif(session()->has('alert'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('alert') }}
        </div>
    @endif


    <form method="post" action="{{ route('agent.login') }}">
        @csrf
        <p>Username</p>
        <input type="text" name="username" placeholder="Enter the Username">
        <p>Password</p>
        <input type="password" name="password" placeholder="Enter your password">
        <input type="submit" name="submit" value="Login">

    </form>
</div>
</body>
</html>