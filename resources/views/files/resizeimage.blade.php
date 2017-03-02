
    <div class="panel panel-primary">
     <div class="panel-heading">Laravel Intervention upload image after resize</div>
      <div class="panel-body"> 
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
              <p class="error_item">{{ $error }}</p>
            @endforeach
        </div>
        @endif
        @if (Session::get('success'))
        
        <div class="row">
            <div class="col-md-12">
            <div class="col-md-4">
                <strong>Image Before Resize:</strong>
            </div>
            <div class="col-md-8">    
                <img src="{{asset('public/normal_images/'.Session::get('imagename')) }}" />
            </div>
            </div>
            <div class="col-md-12" style="margin-top:10px;">
            <div class="col-md-4">
                <strong>Image after Resize:</strong>
            </div>
            <div class="col-md-8">    
                <img src="{{asset('public//thumbnail_images/'.Session::get('imagename')) }}" />
            </div>
            </div>
        </div>
        @endif
        <form role="form" method="POST" enctype="multipart/form-data" action="{{ url('intervention-resizeImage') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
            
                <div class="col-md-6">
                    <br/>
                    <input type="file" class="form-control" name="photo"/>
                </div>
                <div class="col-md-6">
                    <br/>
                    <button type="submit" class="btn btn-primary">Upload Image</button>
                </div>
            </div>
        </form>
     </div>
    </div>
