@extends('admin.admintemplate')
@section('content')
 <div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Edit {{ $page_header }}</h3>
      </div><!-- /.box-header -->
      @include('admin.layout.success')
      <!-- form start -->
      <form role="form" method="POST" action="{{ url('admin/'.strtolower($page_header).'/'.$slide->id) }}" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="id" value="{{ $slide->id }}">

        <div class="box-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" id="name" class="form-control" name="name" value="{{ $slide->name }}" required>
          </div>
          <div class="form-group">
            <label>Old Photo</label>
            <br/>
            <img src="{{asset('storage/app/public/upload/'.strtolower($page_header).'/thumb/'.$slide->photo) }}" />
          </div>
          <div class="form-group">
            <label>Photo</label>
            <input type="file" id="photo" class="form-control" name="photo" value="{{ $slide->photo }}">
            <input type="hidden" class="form-control" name="oldPhoto" value="{{ $slide->photo }}">
          </div>
          <div class="form-group">
            <label>Detail</label>
            <textarea class="form-control" name="detail" rows="2" cols="80">{{ $slide->detail }}</textarea>
          </div>
          
           <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="active_status_id">
             @foreach($status as $status)
              @if($status->id == $slide->active_status_id)
                {{ $selected = 'selected' }}
              @else
                {{ $selected = '' }}
              @endif
              <option {{ $selected }} value="{{ $status->id}}">{{ $status->name }}</option>
             @endforeach
            </select>
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
            Are you sure you want to remove '{{ $slide->name }}' ?
          </p>
        </div>
        <div class="modal-footer">
          <form method="POST" action="{{ url('admin/'.strtolower($page_header).'/'.$slide->id) }}">
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