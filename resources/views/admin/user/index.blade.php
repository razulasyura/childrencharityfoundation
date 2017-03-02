@extends('admin.admintemplate')

@section('content')

    <div class="row">
            <div class="col-xs-12">
             @include('admin.layout.errors')
             @include('admin.layout.success')
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List {{ isset($page_header) ? $page_header : '' }}</h3>
                    <div class="pull-right">
                        <a href="{{ url('register') }}" class="btn btn-success">Tambah {{ isset($page_header) ? $page_header : '' }}</a>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td>{{  $user->name }}</td>
                        <td>{{  $user->email }}</td>
                        <td>
                            <a href="{{ url('admin/'.strtolower(isset($page_header) ? $page_header : '').'/'.$user->id.'/edit') }}"><span class="label label-info">Edit</span></a>
                       </td>
                      </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Aksi</th>
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
      $("#example1").DataTable();
    });
  </script>
@endsection