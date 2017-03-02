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
      <form role="form" method="POST" action="{{ url('admin/'.strtolower($page_header).'/'.$veterinarian->id) }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="id" value="{{ $veterinarian->id }}">

        <div class="box-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" id="name" class="form-control" name="name" value="{{ $veterinarian->name }}" required>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" id="phone" class="form-control" name="phone" value="{{ $veterinarian->phone }}">
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email" id="email" class="form-control" name="email" value="{{ $veterinarian->email }}">
          </div>

          <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" name="address">{{ $veterinarian->address }}</textarea>
          </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <a href="{{ url('admin/'.strtolower(isset($page_header) ? $page_header : 'dashboard')) }}" class="btn btn-success"><i class="fa fa-arrow-circle-left "></i> Back</a>
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
            Are you sure you want to remove '{{ $veterinarian->name }}' from venetarian?
          </p>
        </div>
        <div class="modal-footer">
          <form method="POST" action="{{ url('admin/'.strtolower($page_header).'/'.$veterinarian->id) }}">
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