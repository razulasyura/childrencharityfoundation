@extends('admin.admintemplate')

@section('content')

    <div class="row">
            <div class="col-xs-12">
             @include('admin.layout.errors')
             @include('admin.layout.success')
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List {{ $page_header }}</h3>
                    <div class="pull-right">
                        <a href="{{ url('admin/'.strtolower($page_header).'/create') }}" class="btn btn-success">Tambah {{ $page_header }}</a>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="gallery" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Album</th>

                        <th>Name</th>
                        <th>Photo</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($galleries as $gallery)
                      <tr>
                        <td>{{  $gallery->album_name }}</td>
                        <td>{{  $gallery->name }}</td>
                         <td><img width="15%" src="{{asset('storage/app/public/upload/'.strtolower($page_header).'/thumb/'.$gallery->photo) }}" /></td>
                        
                        <td>
                            <a href="{{ url('admin/'.strtolower($page_header).'/'.$gallery->id.'/edit') }}"><span class="label label-info">Edit</span></a>
                       </td>
                      </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Album</th>

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
@section('script')
<!-- DATA TABLE -->
  <script src="{{ asset('public/adminlte_assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('public/adminlte_assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
  <script>
    $(function () {
      $('#gallery').DataTable( {
        "order": [[ 2, "asc" ]]
    } );
    });
  </script>
@endsection
