<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\ContentCreateRequest;
use App\Http\Requests\ContentEditRequest;
use App\Content;
use Storage;
class ContentController extends Controller
{
    var $filename = 'content';
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
                'contents' => Content::All(),
            );
        // dd($data);
        return view('admin/'.$this->filename.'/index',$data);
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
        return view('admin/'.$this->filename.'/create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentCreateRequest $request)
    {
        /* Upload Image */
        $photo = $request->file('photo');
        $time = date('YmdHis');
        $imagename = $time.'.'.$photo->getClientOriginalExtension(); 
        // thumb
        $destinationPath = storage_path('app/public/upload/'.$this->filename.'/thumb');
        $thumb_img = Image::make($photo->getRealPath())->fit(653, 435);
        $thumb_img->save($destinationPath.'/'.$imagename,100);
        // original
        $destinationPath = storage_path('app/public/upload/'.$this->filename);
        $photo->move($destinationPath, $imagename);
        /* Store Data To Database */
        $content = new Content();
        $content->photo = $imagename;
        $content->name_id = $request->get('name_id');
        $content->name_en = $request->get('name_en');
        $content->detail_id = $request->get('detail_id');
        $content->detail_en = $request->get('detail_en');
        $content->sort = $request->get('sort');
        // dd($content);
        $content->save();

        return redirect('/admin/'.$this->filename)
            ->withSuccess("Content '$content->name_en' was created");
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
                'content' => content::whereId($id)->firstOrFail(),
            );
        // dd($data);
        return view('admin/'.$this->filename.'/edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContentEditRequest $request, $id)
    {
        $content = Content::findOrFail($id);
        $photo = $request->file('photo');
        $oldPhoto = $request->get('oldPhoto');
        
        if(isset($photo)){
        /* Upload Image */    
        $time = date('YmdHis');
        $imagename = $oldPhoto; 
        // thumb
        $destinationPath = storage_path('app/public/upload/'.$this->filename.'/thumb');
        $thumb_img = Image::make($photo->getRealPath())->fit(653, 435);
        $thumb_img->save($destinationPath.'/'.$imagename,100);
        // original
        $destinationPath = storage_path('app/public/upload/'.$this->filename);
        $photo->move($destinationPath, $imagename);

        $content->photo = $imagename;
        }
        $content->name_id = $request->get('name_id');
        $content->name_en = $request->get('name_en');
        $content->detail_id = $request->get('detail_id');
        $content->detail_en = $request->get('detail_en');
        $content->sort = $request->get('sort');
        // dd($content);
        $content->save();
        return redirect("/admin/$this->filename/$id/edit")
            ->withSuccess("Content '$content->name_en' was updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
