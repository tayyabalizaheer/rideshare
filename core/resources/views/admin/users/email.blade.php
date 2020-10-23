@extends('admin.layout.master')

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white font-weight-bold ">
                    <h2>{{$page_title}}</h2>
                </div>

                <form role="form" method="POST" action="{{route('send.email')}}" enctype="multipart/form-data">
                <div class="card-body">
                    @include('errors.error')
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>To</strong></label>
                                        <input type="email" name="emailto" class="form-control form-control-lg" value="{{$user->email}}" readonly >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Name</strong></label>
                                        <input type="text" name="reciver" class="form-control form-control-lg" value="{{$user->fname}} {{$user->lname}}"  readonly>
                                    </div>
                                </div>
                            </div>
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
                </div>

                </form>
            </div>
        </div>
    </div>

@endsection