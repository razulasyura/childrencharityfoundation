@extends('website')
@section('content')
<!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ ('public/maf_assets/images/cover_page/cover_who_we_are_5.jpg') }}">
      <div class="container pt-100 pb-50">
        <!-- Section Content -->
        <div class="section-content text-center">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title text-white">{{ $page_header }}</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
           <h3 class="text-theme-colored text-uppercase mt-0">{{ $page_header }}</h3>
            <table id="example1" class="display">
                    <thead>
                      <tr class="text-theme-colored">
                        <th>Name</th>
                        <!-- <th>Phone</th> -->
                        <!-- <th>Email</th> -->
                        <th>Address</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($volunteers as $volunteer)
                      <tr style="color: #000 !important">
                        <td>{{ $volunteer->name }}</td>
                        <td>{{ $volunteer->address }}</td>
                      </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                      <tr class="text-theme-colored">
                        <th>Name</th>
                        <th>Address</th>
                      </tr>
                    </tfoot>
                  </table>

          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
           <h3 class="text-theme-colored text-uppercase mt-0">{{ $page_header }}</h3>

            <iframe src="https://docs.google.com/spreadsheets/d/18KShIQV60-Ju3oShJDRyuiD57G5imOuCzfWE5ieDMGk/pubhtml?gid=551467321&amp;single=true&amp;widget=true&amp;headers=false"></iframe>
          </div>
        </div>
      </div>
    </section>


  </div>
  <!-- end main-content -->
@endsection
@section('css')
<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
@endsection
@section('js')
<!-- DATA TABLE -->
  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  <script>
    $(function () {
      $("#example1").DataTable();
    });
  </script>
@endsection
