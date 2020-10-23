@extends('admin.layout.master')

@section('body')


    <div class="card">
        <div class="card-header bg-white font-weight-bold">

            <div class="float-left">
                <h3 class="mb-4">{{$page_title}}</h3>
            </div>

            <div class="float-right">
                @if($data->reply != null)
                    <a href="javascript:void(0)" class="btn btn-danger  btn-icon ">
                        <i class="fa fa-envelope"></i> Replied
                    </a>
                @else
                    <a href="javascript:void(0)" data-id="{{$data->id}}"
                       class="btn btn-success  btn-icon  delete_button "
                       data-toggle="modal" data-target="#DelModal">
                        <i class="fa fa-envelope"></i> Message
                    </a>
                @endif

            </div>
        </div>
        <div class="card-body">
            @include('errors.error')

            <table class="table table-hover">
                <thead>
                <tr>
                    <td>Name</td>
                    <td colspan="2">{{$data->name}} </td>
                </tr>
                <tr>
                    <td>Email Address</td>
                    <td>{{$data->email}}</td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td>{{$data->phone}}</td>
                </tr>
                <tr>
                    <td>Enquiry</td>
                    <td>{{$data->enquiry}}</td>
                </tr>
                <tr>
                    <td>Read</td>
                    <td>
                        <span class="badge badge-{{($data->read == 1 ) ? 'success' : 'danger'}}">{{($data->read == 1 ) ? 'Yes' : 'No'}}</span
                    </td>
                </tr>
                <tr>
                    <td>IP</td>
                    <td>{{$data->ip}}</td>
                </tr>
                @if($data->reply != null)
                    <tr>
                        <td><strong>Reply</strong></td>
                        <td>{{$data->reply}}</td>
                    </tr>
                @endif
                </thead>
            </table>

        </div>
    </div>




    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2">
                        <i class="fa fa-envelope"></i> Message
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form method="post" action="{{route('enquiry.update', $data->id)}}">
                    {{method_field('put')}}
                    {!! csrf_field() !!}
                    <div class="modal-body">
                        <textarea name="reply" class="form-control"
                                  placeholder="Write something">{{old('reply')}}</textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="sbtn" value="1" class="btn btn-success"><i
                                    class="fa fa-envelope"></i> Send To E-mail
                        </button>
                        
                        <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>&nbsp;
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
@section('script')

@endsection