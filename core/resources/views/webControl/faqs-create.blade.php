@extends('admin.layout.master')
@section('body')
    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            <h4>{{$page_title}}</h4>
        </div>
        {!! Form::open(['method'=>'post','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}
        <div class="card-body">


            <div class="form-group">
                <label class="col-md-12"><strong style="text-transform: uppercase;">Question Title</strong></label>
                <div class="col-md-12 ">
                    <input name="title" class="form-control input-lg" placeholder="Question Title" required/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12"><strong style="text-transform: uppercase;">Question Answer</strong></label>
                <div class="col-md-12 ">
                    <textarea name="description" id="area1" rows="10" class="form-control" required
                              placeholder="Question Answer"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" onclick="nicEditors.findEditor('area1').saveContent();"
                            class="btn btn-primary btn-block bold btn-lg uppercase"><i class="fa fa-send"></i> Create
                        FAQS
                    </button>
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </div>





@stop
@section('script')
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

    <script type="text/javascript">
        bkLib.onDomLoaded(function () {
            new nicEditor({fullPanel: true}).panelInstance('area1');
        });
    </script>
@stop