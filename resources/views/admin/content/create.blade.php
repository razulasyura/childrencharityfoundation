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
        <div class="col-md-6">
          <div class="form-group">
            <label>Name (Indonesia)</label>
            <input type="text" id="name_id" class="form-control" name="name_id" required>
          </div>
         
        </div>

        <div class="col-md-6">         
         <div class="form-group">
            <label>Name (English)</label>
            <input type="text" id="name_en" class="form-control" name="name_en" required>
          </div>
         
        </div>

        <div class="col-md-12">
         <div class="form-group">
            <label>Detail (Indonesia)</label> <b><a class="btn btn-primary btn-sm" target="blank" href="https://postimage.io/"><i class="fa fa-photo"></i> Upload Gambar</a></b>
            <textarea class="form-control" id="detail_id" name="detail_id"></textarea>
          </div>
           <div class="form-group">
            <label>Detail (English)</label> <b><a class="btn btn-primary btn-sm" target="blank" href="https://postimage.io/"><i class="fa fa-photo"></i> Upload Gambar</a></b>
            <textarea class="form-control" id="detail_en" name="detail_en"></textarea>
          </div>
          <div class="form-group">
            <label>Photo</label>
            <input type="file" id="photo" class="form-control" name="photo" required>
          </div>
          <div class="form-group">
            <label>Sort</label>
            <input type="number" id="sort" class="form-control" name="sort" required>
          </div>
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
@section('script')
 <!-- CK EDITOR -->
  <script src="//cdn.ckeditor.com/4.6.1/full/ckeditor.js"></script>
  <script>
    $(function () {
      CKEDITOR.replace('detail_id');
      CKEDITOR.replace('detail_en');
    });
  </script>
@endsection