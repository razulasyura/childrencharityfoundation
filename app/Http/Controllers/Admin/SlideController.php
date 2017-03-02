<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SlideCreateRequest;
use App\Http\Requests\SlideEditRequest;
use Intervention\Image\Facades\Image;
use App\Slide;
use App\ActiveStatus;
use Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    var $filename = 'slide';
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = array(
                'page_header'=> title_case($this->filename),
                'page_description'=> title_case($this->filename).' Index',
            );
        $slides = Slide::getSlide();
        // dd($slides);
        return view('admin/'.$this->filename.'/index',$data)
            ->withSlides($slides);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
                'page_header'=> title_case($this->filename),
                'page_description'=> title_case($this->filename).' Create',
            );
        $active = ActiveStatus::All();
        return view('admin/'.$this->filename.'/create',$data)
            ->withStatus($active);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlideCreateRequest $request)
    {
        /* Upload Image */
        $photo = $request->file('photo');
        $time = date('YmdHis');
        $imagename = $time.'.'.$photo->getClientOriginalExtension(); 
        // original
        $destinationPath = storage_path('app/public/upload/'.$this->filename);
        $thumb_img = Image::make($photo->getRealPath())->fit(1920, 1280);
        $thumb_img->save($destinationPath.'/'.$imagename,100);
        // thumb
        $destinationPath = storage_path('app/public/upload/'.$this->filename.'/thumb');
        $home_img = Image::make($photo->getRealPath())->fit(192, 128);
        $home_img->save($destinationPath.'/'.$imagename,100);
        
        /* Store Data To Database */
        $slide = new Slide();
        $slide->name = $request->get('name');
        $slide->photo = $imagename;
        $slide->detail = $request->get('detail');
        $slide->active_status_id = $request->get('active_status_id');
        // dd($slide);
        $slide->save();

        return redirect('/admin/'.$this->filename)
            ->withSuccess("$this->filename '$slide->name' was created");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
                'page_header'=> title_case($this->filename),
                'page_description'=> title_case($this->filename).' Edit',
            );
        $slides = Slide::whereId($id)->firstOrFail();
        $status =  ActiveStatus::All();
        // dd($status);
        // dd($data)
        return view('admin/'.$this->filename.'/edit',$data)
            ->withSlide($slides)
            ->withStatus($status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SlideEditRequest $request, $id)
    {
        $slide = Slide::findOrFail($id);
        $photo = $request->file('photo');
        $oldPhoto = $request->get('oldPhoto');
        
        if(isset($photo)){
        /* Upload Image */    
        $imagename = $oldPhoto; 
        // thumb
        $destinationPath = storage_path('app/public/upload/'.$this->filename.'/thumb');
        $thumb_img = Image::make($photo->getRealPath())->fit(192, 128);
        $thumb_img->save($destinationPath.'/'.$imagename,100);
        // original
        $destinationPath = storage_path('app/public/upload/'.$this->filename);
        $home_img = Image::make($photo->getRealPath())->fit(1920, 1280);
        $home_img->save($destinationPath.'/'.$imagename,100);

        $slide->photo = $imagename;
        }

        $slide->name = $request->get('name');
        $slide->detail = $request->get('detail');
        $slide->active_status_id = $request->get('active_status_id');
        // dd($slide);
        $slide->save();
        return redirect("/admin/$this->filename/$id/edit")
            ->withSuccess("$this->filename '$slide->name' was updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);
        // dd($slide);
        $slide->delete();
        $file = $slide->photo;
        $delete = Storage::delete([
            'public/upload/'.$this->filename.'/thumb/'.$file,
            'public/upload/'.$this->filename.'/'.$file]);
        // dd($delete);        

        return redirect('/admin/'.$this->filename)
            ->withSuccess("$this->filename '$slide->name' was deleted");
    }
}
