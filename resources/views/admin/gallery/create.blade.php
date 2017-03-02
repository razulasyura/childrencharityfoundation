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
            <label>Photo Name</label>
            <input type="text" id="name" class="form-control" name="name" required>
          </div>
          <div class="form-group">
            <label>Detail</label>
            <textarea class="form-control" name="detail"></textarea>
          </div>
           <div class="form-group">
            <label>Photo</label>
            <input type="file" id="photo" class="form-control" name="photo" required>
          </div>
          <div class="form-group">
            <!-- <label>Sort</label> -->
            <input type="hidden" id="sort" class="form-control" name="sort" value = "21">
          </div>
          <div class="form-group">
            <label>Album</label>
            <select class="form-control" name="album_id">
             @foreach($albums as $album)
              <option value="{{ $album->id}}">{{ $album->name }}</option>
             @endforeach
            </select>
          </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <a href="{{ url('admin/'.strtolower(isset($page_header) ? $page_header : 'dashboard')) }}" class="btn btn-success"><i class="fa fa-arrow-circle-left "></i> Back</a>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        </div>
      </form>
    </div><!-- /.box -->
  </div><!--/.col (left) -->
  <!-- right column -->

</div>   <!-- /.row -->
@endsection