<?php
/**
 * @author
 * Muhammad Zulfikar
 * razul.asyura@gmail.com
 * muhammadzulfikar.com
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Album;
use App\Http\Controllers\Controller;
use App\Http\Requests\AlbumCreateRequest;
use App\Http\Requests\AlbumEditRequest;
use Intervention\Image\Facades\Image;


class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = array(
                'page_header'=>'Album',
                'page_description'=>'Album Index',
            );
        // $albums = Album::all();
        $albums = Album::getAlbum();
        return view('admin.album.index',$data)
            ->withAlbums($albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
                'page_header'=>'Album',
                'page_description'=>'Album Create',
            );
        return view('admin.album.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumCreateRequest $request)
    {
        /* Upload Image */
        $photo = $request->file('photo');
        $time = date('YmdHis');
        $imagename = $time.'.'.$photo->getClientOriginalExtension(); 
        // thumb
        $destinationPath = storage_path('app/public/upload/album/thumb');
        $thumb_img = Image::make($photo->getRealPath())->fit(450, 250);
        $thumb_img->save($destinationPath.'/'.$imagename,80);
        // home
        $destinationPath = storage_path('app/public/upload/album/home');
        $home_img = Image::make($photo->getRealPath())->fit(80, 55);
        $home_img->save($destinationPath.'/'.$imagename,100);
        // original
        $destinationPath = storage_path('app/public/upload/album');
        $photo->move($destinationPath, $imagename);
        /* Store Data To Database */
        $album = new Album();
        $album->name = $request->get('name');
        $album->detail = $request->get('detail');
        $album->photo = $imagename;
        $album->sort = $request->get('sort');
        $album->status = "active";
        // dd($album);
        $album->save();

        return redirect('/admin/album')
            ->withSuccess("Album '$album->name' was created");
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
                'page_header'=>'Album',
                'page_description'=>'Album Edit',
            );
        $album = Album::whereId($id)->firstOrFail();
        return view('admin.album.edit',$data)->withAlbum($album);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumEditRequest $request, $id)
    {
        $album = Album::findOrFail($id);         
        $photo = $request->file('photo');
        // get old image for replace with updated image
        $oldPhoto = $request->get('oldPhoto');
        
        if(isset($photo)){
        /* Upload Image */    
        $time = date('YmdHis');
        // $imagename = $time.'.'.$photo->getClientOriginalExtension(); 
        $imagename = $oldPhoto; 
         // thumb
        $destinationPath = storage_path('app/public/upload/album/thumb');
        $thumb_img = Image::make($photo->getRealPath())->fit(450, 250);
        $thumb_img->save($destinationPath.'/'.$imagename,80);
        // home
        $destinationPath = storage_path('app/public/upload/album/home');
        $home_img = Image::make($photo->getRealPath())->fit(80, 55);
        $home_img->save($destinationPath.'/'.$imagename,100);
        // original
        $destinationPath = storage_path('app/public/upload/album');
        $photo->move($destinationPath, $imagename);

        $album->photo = $imagename;
        }

        $album->name = $request->get('name');
        $album->detail = $request->get('detail');
        $album->sort = $request->get('sort');
        $album->status = "active";
        $album->save();
        return redirect("/admin/album/$id/edit")
            ->withSuccess("The Album '$album->name' was updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album->status = "inactive";
        $album->save();

        return redirect('/admin/album')
            ->withSuccess("The Album '$album->name' was inactive");
    }
}
