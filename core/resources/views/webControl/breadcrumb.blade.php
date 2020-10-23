@extends('admin.layout.master')
@section('import-css')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@stop
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <form action="" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Change
                                            breadcrumb Image</strong></label>
                                    <div class="col-sm-12">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input input-fixed input-medium"
                                                     data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                    <span class="fileinput-filename"> </span>
                                                </div>
                                                <span class="input-group-addon btn btn-success btn-file">
                                                                    <span class="fileinput-new  bold"> Change breadcrumb Image </span>
                                                                    <span class="fileinput-exists bold"> Change </span>
                                                                    <input type="file" name="breadcrumb"> </span>
                                                <a href="javascript:;" style="margin-left: 5px"
                                                   class="input-group-addon btn btn-danger fileinput-exists"
                                                   data-dismiss="fileinput"> Remove </a>
                                            </div>
                                            <code>breadcrumb Image Mimes Type : jpg </code>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <img class="img-responsive" src="{{ asset('assets/images/logo/breadcrumb.jpg') }}"
                                     alt="logo" width="100%">
                            </div>
                        </div>
                        <br><br>


                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Change Tour Background Image</strong></label>
                                    <div class="col-sm-12">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input input-fixed input-medium"
                                                     data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                    <span class="fileinput-filename"> </span>
                                                </div>
                                                <span class="input-group-addon btn btn-success btn-file">
                                                                    <span class="fileinput-new  bold"> Change Tour Background Image </span>
                                                                    <span class="fileinput-exists bold"> Change </span>
                                                                    <input type="file" name="tour_bg"> </span>
                                                <a href="javascript:;" style="margin-left: 5px"
                                                   class="input-group-addon btn btn-danger fileinput-exists"
                                                   data-dismiss="fileinput"> Remove </a>
                                            </div>
                                            <code>Tour Background Image Image Mimes Type : jpg </code>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <img class="img-responsive" src="{{ asset('assets/images/logo/tour_bg.jpg') }}"
                                     alt="logo" width="100%">
                            </div>
                        </div>
                        <br><br>




                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Change
                                            Contact Form Image</strong></label>
                                    <div class="col-sm-12">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input input-fixed input-medium"
                                                     data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                    <span class="fileinput-filename"> </span>
                                                </div>
                                                <span class="input-group-addon btn btn-success btn-file">
                                                                    <span class="fileinput-new  bold"> Change Contact Form Image </span>
                                                                    <span class="fileinput-exists bold"> Change </span>
                                                                    <input type="file" name="contactForm"> </span>
                                                <a href="javascript:;" style="margin-left: 5px"
                                                   class="input-group-addon btn btn-danger fileinput-exists"
                                                   data-dismiss="fileinput"> Remove </a>
                                            </div>
                                            <code>Contact Form Image Mimes Type : jpg </code>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <img class="img-responsive" src="{{ asset('assets/images/logo/contactForm.jpg') }}"
                                     alt="logo" width="100%">
                            </div>
                        </div>
                        <br><br>


                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Change
                                            Login Form Image</strong></label>
                                    <div class="col-sm-12">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input input-fixed input-medium"
                                                     data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                    <span class="fileinput-filename"> </span>
                                                </div>
                                                <span class="input-group-addon btn btn-success btn-file">
                                                                    <span class="fileinput-new  bold"> Change Login Form Image </span>
                                                                    <span class="fileinput-exists bold"> Change </span>
                                                                    <input type="file" name="loginForm"> </span>
                                                <a href="javascript:;" style="margin-left: 5px"
                                                   class="input-group-addon btn btn-danger fileinput-exists"
                                                   data-dismiss="fileinput"> Remove </a>
                                            </div>
                                            <code>Contact Login Image Mimes Type : jpg </code>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <img class="img-responsive" src="{{ asset('assets/images/logo/loginForm.jpg') }}"
                                     alt="logo" width="100%">
                            </div>
                        </div>
                        <br><br>





                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block"><i
                                            class="fa fa-send"></i> UPDATE
                                </button>
                            </div>

                    </form>


                </div>
            </div>
        </div>
    </div>


@stop

@section('import-script')
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
@stop