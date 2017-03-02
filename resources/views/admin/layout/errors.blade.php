@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    There were some problems with your data.<br><br>
    
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif