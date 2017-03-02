<?php
/**
 * @author
 * Muhammad Zulfikar
 * razul.asyura@gmail.com
 * muhammadzulfikar.com
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramCreateRequest;
use App\Http\Requests\ProgramEditRequest;
use App\Program;
use Intervention\Image\Facades\Image;

class ProgramController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {	
    	$data = array(
    			'page_header'=>'Program',
    			'page_description'=>'Program Index',
    		);
    	$programs = Program::all();
    	return view('admin.program.index',$data)
    		->withPrograms($programs);
    }

    public function create()
    {
    	$data = array(
    			'page_header'=>'Program',
    			'page_description'=>'Program Create',
    		);
    	return view('admin.program.create',$data);
    }

    public function store(ProgramCreateRequest $request)
    {
        /* Upload Image */
        $photo = $request->file('photo');
        $time = date('YmdHis');
        $imagename = $time.'.'.$photo->getClientOriginalExtension(); 
        $destinationPath = storage_path('app/public/upload/program/thumb');
        $thumb_img = Image::make($photo->getRealPath())->fit(270, 230);
        $thumb_img->save($destinationPath.'/'.$imagename,100);
                    
        $destinationPath = storage_path('app/public/upload/program');
        $photo->move($destinationPath, $imagename);

    	$program = new Program();
    	$program->name = $request->get('name');
    	$program->photo = $imagename;
    	$program->detail = $request->get('detail');
    	$program->save();

    	return redirect('/admin/program')
    		->withSuccess("The Program '$program->name' was created");
    }

    public function edit($id)
    {
    	$data = array(
    			'page_header'=>'Program',
    			'page_description'=>'Program Edit',
    		);
    	$program = Program::whereId($id)->firstOrFail();
    	return view('admin.program.edit',$data)->withProgram($program);
    }

    public function update(ProgramEditRequest $request,$id)
    {
    	$program = Program::findOrFail($id);
        $photo = $request->file('photo');
        $oldPhoto = $request->get('oldPhoto');
        
        if(isset($photo)){
        /* Upload Image */    
        $time = date('YmdHis');
        $imagename = $oldPhoto; 
        $destinationPath = storage_path('app/public/upload/program/thumb');
        $thumb_img = Image::make($photo->getRealPath())->fit(270, 230);
        $thumb_img->save($destinationPath.'/'.$imagename,100);           
        $destinationPath = storage_path('app/public/upload/program');
        $photo->move($destinationPath, $imagename);
        $program->photo = $imagename;
        }
    	
        $program->name = $request->get('name');
    	$program->detail = $request->get('detail');
    	$program->save();

    	return redirect("/admin/program/$id/edit")
    		->withSuccess("The Program '$program->name' was updated");
    }

    public function destroy($id)
    {
    	$program = Program::findOrFail($id);
    	$program->delete();

    	return redirect('/admin/program')
    		->withSuccess("The Program '$program->name' was deleted");

    }
}
