@extends('admin.admintemplate')
@section('content')
 <div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Create {{ isset($page_header) ? $page_header : 'Default' }}</h3>
      </div><!-- /.box-header -->
      @include('admin.layout.errors')
      <!-- form start -->
      <form role="form" method="POST" action="{{ url('admin/'.strtolower($page_header)) }}" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
          <div class="form-group">
            <label>Album Name</label>
            <input type="text" id="name" class="form-control" name="name" required>
          </div>
          <div class="form-group">
            <label>Detail</label>
            <textarea class="form-control" name="detail" rows="2"></textarea>
          </div>
           <div class="form-group">
            <label>Photo</label>
            <input type="file" id="photo" class="form-control" name="photo" required>
          </div>
          <div class="form-group">
            <label>Sort</label>
            <input type="number" id="sort" class="form-control" name="sort">
          </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        </div>
      </form>
    </div><!-- /.box -->
  </div><!--/.col (left) -->
  <!-- right column -->

</div>   <!-- /.row -->
@endsection