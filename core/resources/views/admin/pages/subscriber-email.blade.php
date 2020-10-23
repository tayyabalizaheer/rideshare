@extends('admin.layout.master')

@section('body')
    <div class="card">


        <div class="card-header bg-white font-weight-bold">
            <h4 class="float-left">{{$page_title}}</h4>
            <a href="{{route('manage.subscribers')}}" class="btn btn-success  btn-lg float-right">
                <i class="fa fa-eye"></i> View Subscribers
            </a>
        </div>

        <div class="card-body">
            @include('errors.error')
            <form role="form" method="POST" action="{{route('send.email.subscriber')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-body">
                    <div class="form-group">
                        <label><strong>Subject</strong></label>
                        <input type="text" name="subject" class="form-control form-control-lg" value="{{old('subject')}}">
                    </div>
                    <div class="form-group">
                        <label><strong>Email Message</strong></label>
                        <textarea class="form-control form-control-lg" name="emailMessage" rows="10">{{old('emailMessage')}}</textarea>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="submit-btn btn btn-primary btn-lg btn-block login-button">Send Email</button>
                </div>
            </form>
        </div>
    </div>

@endsection