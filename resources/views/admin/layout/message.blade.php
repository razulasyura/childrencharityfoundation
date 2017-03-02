@if (Session::has('message'))
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>
      <i class="fa fa-check-circle fa-lg fa-fw"></i> Information  
    </strong>
    {{ Session::get('message') }}
  </div>
@endif