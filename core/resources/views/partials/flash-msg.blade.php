@if(session('success'))
    <div class="alert alert-success">
        {{__(session('success'))}}
    </div>
@endif
@if(session('alert'))
    <div class="alert alert-danger">
        {{__(session('alert'))}}
    </div>
@endif