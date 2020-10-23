@extends('admin.layout.master')
@section('css')

@stop
@section('body')
          <div class="card">
              <div class="card-header bg-white font-weight-bold">
                  <h4 class="float-left">{{$page_title}}</h4>

                  <a href="{{ route('menu-control') }}" class="btn btn-primary float-right"><i class="fa fa-eye"></i> All Menu</a>

              </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('menu-create') }}" method="post" role="form">

                        {!! csrf_field() !!}
                        <div class="form-body">

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-12"><strong style="text-transform: uppercase;">Menu Name</strong></label>
                                <div class="col-md-12">
                                    <input class="form-control input-lg" name="name" placeholder="" type="text" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12"><strong style="text-transform: uppercase;">CONTENT</strong></label>
                                <div class="col-md-12">
                                    <textarea id="area1" class="form-control" rows="15" name="description"></textarea>
                                </div>
                            </div>
                            <br>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-plus"></i> ADD MENU</button>
                                </div>


                        </div>
                    </form>
                </div>
            </div>





@stop

@section('script')
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

    <script type="text/javascript">
        bkLib.onDomLoaded(function() { new nicEditor({fullPanel : true}).panelInstance('area1'); });
    </script>
@stop