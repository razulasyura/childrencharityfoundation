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
                        <!-- <a href="{{ url('admin/'.strtolower($page_header).'/create') }}" class="btn btn-success">Tambah {{ isset($page_header) ? $page_header : 'Default' }}</a> -->
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($programs as $program)
                      <tr>
                        <td>{{  $program->name }}</td>
                        <td><img width="15%" height="15%" src="{{asset('storage/app/public/upload/'.strtolower($page_header).'/thumb/'.$program->photo) }}" /></td>
                        <td>
                            <a href="{{ url('admin/'.strtolower(isset($page_header) ? $page_header : 'Default').'/'.$program->id.'/edit') }}"><span class="label label-info">Edit</span></a>
                       </td>
                      </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->

              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
@endsection