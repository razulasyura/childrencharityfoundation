@extends('admin.admintemplate')

@section('content')

    <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List {{ isset($page_header) ? $page_header : 'Default' }}</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    Welcome <b>{{ Auth::user()->name }}</b>
                </div><!-- /.box-body -->

              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
@endsection