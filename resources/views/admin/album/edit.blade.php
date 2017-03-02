@extends('admin.admintemplate')
@section('content')
 <div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Edit {{ isset($page_header) ? $page_header : 'Default' }}</h3>
      </div><!-- /.box-header -->
      @include('admin.layout.success')
      <!-- form start -->
      <form role="form" method="POST" action="{{ url('admin/'.strtolower($page_header).'/'.$album->id) }}" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="id" value="{{ $album->id }}">

        <div class="box-body">
          <div class="form-group">
            <label>Album Name</label>
            <input type="text" id="name" class="form-control" name="name" value="{{ $album->name }}" required>
          </div>
          <div class="form-group">
            <label>Detail</label>
            <textarea name="detail" class="form-control" rows="2">{{ $album->detail }}</textarea>
          </div>
          <div class="form-group">
            <label>Photo</label>
            <input type="file" id="photo" class="form-control" name="photo" value="{{ $album->photo }}">
            <input type="hidden" class="form-control" name="oldPhoto" value="{{ $album->photo }}">
          </div>
          <div class="form-group">
            <label>Sort</label>
            <input type="text" id="sort" class="form-control" name="sort" value="{{ $album->sort }}">
          </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-trash"></i> Delete</button>
        </div>
      </form>
    </div><!-- /.box -->
  </div><!--/.col (left) -->
  <!-- right column -->

</div>   <!-- /.row -->

  <div class="modal fade" id="modal-delete" tabIndex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            ×
          </button>
          <h4 class="modal-title">Please Confirm</h4>
        </div>
        <div class="modal-body">
          <p class="lead">
            <i class="fa fa-question-circle"></i>  
            Are you sure you want to disable, '{{ $album->name }}' from program?<br/>
          </p>
        </div>
        <div class="modal-footer">
          <form method="POST" action="{{ url('admin/'.strtolower($page_header).'/'.$album->id) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="DELETE">
            <button type="button" class="btn btn-default"
                    data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">
              <i class="fa fa-times-circle"></i> Yes
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection