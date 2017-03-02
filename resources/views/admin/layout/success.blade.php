@if (Session::has('success'))
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>
      <i class="fa fa-check-circle fa-lg fa-fw"></i> Success.  
    </strong>
    {{ Session::get('success') }}, <a href="{{ url('admin/'.strtolower(isset($page_header) ? $page_header : 'Default')) }}">  Go to List {{ isset($page_header) ? $page_header : 'Default' }}</a>
  </div>
@endif

@if (Session::has('password'))
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>
      <i class="fa fa-check-circle fa-lg fa-fw"></i> Success.  
    </strong>
    {{ Session::get('success') }}
  </div>
@endif