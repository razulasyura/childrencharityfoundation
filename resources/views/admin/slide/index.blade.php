@extends('admin.admintemplate')
@section('content')

    <div class="row">
      <div class="col-xs-12">
       @include('admin.layout.errors')
       @include('admin.layout.success')
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">List {{ isset($page_header) ? $page_header : 'Default' }}</h3>
              <div class="pull-right">
                  <a href="{{ url('admin/'.strtolower($page_header).'/create') }}" class="btn btn-success">Tambah {{ isset($page_header) ? $page_header : 'Default' }}</a>
              </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Preview Slide</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($slides as $slide)
                <tr>
                  <td>{{  $slide->name }}</td>
                  <td><img width="30%" src="{{asset('storage/app/public/upload/'.strtolower($page_header).'/thumb/'.$slide->photo) }}" /></td>
                  <td>{{  $slide->status }}</td>
                  <td>
                      <a href="{{ url('admin/'.strtolower(isset($page_header) ? $page_header : 'Default').'/'.$slide->id.'/edit') }}"><span class="label label-info">Edit</span></a>
                 </td>
                </tr>
              @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Preview Slide</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div><!-- /.box-body -->

        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
@endsection