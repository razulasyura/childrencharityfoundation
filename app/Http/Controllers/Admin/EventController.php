<?php
/**
 * @author
 * Muhammad Zulfikar
 * razul.asyura@gmail.com
 * muhammadzulfikar.com
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests\EventCreateRequest;
use App\Http\Requests\EventEditRequest;
use App\Http\Controllers\Controller;
use App\Event;
use App\Album;
use Storage;

class EventController extends Controller
{
    var $filename = 'event';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
                'page_header'=> title_case($this->filename),
                'page_description'=> title_case($this->filename).' Index',
            );
        $events = Event::getEvent();
        // dd($events);
        return view('admin/'.$this->filename.'/index',$data)
            ->withEvents($events);
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
        $albums =  Album::All();
        return view('admin.event.create',$data)
            ->withAlbums($albums);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventCreateRequest $request)
    {
        /* Upload Image */
        $photo = $request->file('photo');
        $time = date('YmdHis');
        $imagename = $time.'.'.$photo->getClientOriginalExtension(); 
        // thumb
        $destinationPath = storage_path('app/public/upload/'.$this->filename.'/thumb');
        $thumb_img = Image::make($photo->getRealPath())->fit(1920, 1080);
        $thumb_img->save($destinationPath.'/'.$imagename,80);
        // blog
        $destinationPath = storage_path('app/public/upload/'.$this->filename.'/blog');
        $thumb_img = Image::make($photo->getRealPath())->fit(360, 220);
        $thumb_img->save($destinationPath.'/'.$imagename,80);
        // original
        $destinationPath = storage_path('app/public/upload/'.$this->filename);
        $photo->move($destinationPath, $imagename);
        /* Store Data To Database */
        $event = new Event();
        $event->name = $request->get('name');
        $event->photo = $imagename;
        $event->detail = $request->get('detail');
        $event->albums_id = $request->get('albums_id');
        // dd($event);
        $event->save();

        return redirect('/admin/'.$this->filename)
            ->withSuccess("Event '$event->name' was created");
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
        $albums =  Album::All();
        $event = Event::whereId($id)->firstOrFail();
        // dd($data)
        return view('admin/'.$this->filename.'/edit',$data)
            ->withEvent($event)
            ->withAlbums($albums);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventEditRequest $request, $id)
    {
        $event = Event::findOrFail($id);
        $photo = $request->file('photo');
        $oldPhoto = $request->get('oldPhoto');
        
        if(isset($photo)){
        /* Upload Image */    
        $time = date('YmdHis');
        $imagename = $oldPhoto; 
        // thumb
        $destinationPath = storage_path('app/public/upload/'.$this->filename.'/thumb');
        $thumb_img = Image::make($photo->getRealPath())->fit(1920, 1080);
        $thumb_img->save($destinationPath.'/'.$imagename,80);
        // blog
        $destinationPath = storage_path('app/public/upload/'.$this->filename.'/blog');
        $thumb_img = Image::make($photo->getRealPath())->fit(360, 220);
        $thumb_img->save($destinationPath.'/'.$imagename,80);
        // original
        $destinationPath = storage_path('app/public/upload/'.$this->filename);
        $photo->move($destinationPath, $imagename);

        $event->photo = $imagename;
        }

        $event->name = $request->get('name');
        $event->detail = $request->get('detail');
        $event->albums_id = $request->get('albums_id');
        // dd($event);
        $event->save();
        return redirect("/admin/$this->filename/$id/edit")
            ->withSuccess("Event '$event->name' was updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        // dd($event);
        $event->delete();
        $file = $event->photo;
        $delete = Storage::delete([
            'public/upload/'.$this->filename.'/thumb/'.$file,
            'public/upload/'.$this->filename.'/'.$file]);
        // dd($delete);        

        return redirect('/admin/'.$this->filename)
            ->withSuccess("Event '$event->name' was deleted");
    }
}
