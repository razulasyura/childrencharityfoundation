<?php
/**
 * @author
 * Muhammad Zulfikar
 * razul.asyura@gmail.com
 * muhammadzulfikar.com
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryCreateRequest;
use App\Http\Requests\GalleryEditRequest;
use Intervention\Image\Facades\Image;
use App\Gallery;
use App\Album;
use Storage;

class GalleryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
                'page_header'=>'Gallery',
                'page_description'=>'Gallery Index',
            );
        $galleries = Gallery::getGallery();
        // dd($galleries);
        return view('admin.gallery.index',$data)
            ->withGalleries($galleries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
                'page_header'=>'Gallery',
                'page_description'=>'Gallery Create',
            );
        $albums =  Album::getAlbumActive();
        return view('admin.gallery.create',$data)
            ->withAlbums($albums);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryCreateRequest $request)
    {
        /* Upload Image */
        $photo = $request->file('photo');
        $time = date('YmdHis');
        $imagename = $time.'.'.$photo->getClientOriginalExtension(); 
        // thumb
        $destinationPath = storage_path('app/public/upload/gallery/thumb');
        $thumb_img = Image::make($photo->getRealPath())->fit(450, 250);
        $thumb_img->save($destinationPath.'/'.$imagename,80);
        // home
        $destinationPath = storage_path('app/public/upload/gallery/home');
        $home_img = Image::make($photo->getRealPath())->fit(200, 111);
        $home_img->save($destinationPath.'/'.$imagename,80);
        // original            
        $destinationPath = storage_path('app/public/upload/gallery');
        $photo->move($destinationPath, $imagename);
        
        /* Store Data To Database */
        $gallery = new Gallery();
        $gallery->name = $request->get('name');
        $gallery->detail = $request->get('detail');
        $gallery->photo = $imagename;
        $gallery->sort = $request->get('sort');
        $gallery->album_id = $request->get('album_id');
        $gallery->save();

        return redirect('/admin/gallery')
            ->withSuccess("Gallery '$gallery->name' was created");
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
                'page_header'=>'Gallery',
                'page_description'=>'Gallery Edit',
            );
        $albums =  Album::getAlbumActive();
        $gallery = Gallery::whereId($id)->firstOrFail();
        return view('admin.gallery.edit',$data)
            ->withGallery($gallery)
            ->withAlbums($albums);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryEditRequest $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $photo = $request->file('photo');
        $oldPhoto = $request->get('oldPhoto');
        
        if(isset($photo)){
        /* Upload Image */    
        $time = date('YmdHis');
        // $imagename = $time.'.'.$photo->getClientOriginalExtension(); 
        $imagename = $oldPhoto; 
        // thumb
        $destinationPath = storage_path('app/public/upload/gallery/thumb');
        $thumb_img = Image::make($photo->getRealPath())->fit(450, 250);
        $thumb_img->save($destinationPath.'/'.$imagename,80);           
        // home
        $destinationPath = storage_path('app/public/upload/gallery/home');
        $home_img = Image::make($photo->getRealPath())->fit(200, 111);
        $home_img->save($destinationPath.'/'.$imagename,80);
        // original
        $destinationPath = storage_path('app/public/upload/gallery');
        $photo->move($destinationPath, $imagename);
    
        $gallery->photo = $imagename;
        }

        $gallery->name = $request->get('name');
        $gallery->detail = $request->get('detail');
        $gallery->sort = $request->get('sort');
        $gallery->album_id = $request->get('album_id');
        // dd($gallery);
        $gallery->save();
        return redirect("/admin/gallery/$id/edit")
            ->withSuccess("Gallery '$gallery->name' was updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $file = $gallery->photo;
        $delete = Storage::delete(['public/upload/gallery/thumb/'.$file,'public/upload/gallery/'.$file]);
        // dd($delete);        
        $gallery->delete();

        return redirect('/admin/gallery')
            ->withSuccess("Gallery '$gallery->name' was deleted");
    }
}
