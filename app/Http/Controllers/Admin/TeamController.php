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
use App\Http\Requests\TeamCreateRequest;
use App\Http\Requests\TeamEditRequest;
use App\Team;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {	
    	$data = array(
    			'page_header'=>'Team',
    			'page_description'=>'Team Index',
    		);
    	$teams = Team::all();
    	return view('admin.team.index',$data)
    		->withTeams($teams);
    }

    public function create()
    {
    	$data = array(
    			'page_header'=>'Team',
    			'page_description'=>'Team Create',
    		);
    	return view('admin.team.create',$data);
    }

    public function store(TeamCreateRequest $request)
    {
        /* Upload Image */
        $photo = $request->file('photo');
        $time = date('YmdHis');
        $imagename = $time.'.'.$photo->getClientOriginalExtension(); 
        $destinationPath = storage_path('app/public/upload/team/thumb');
        $thumb_img = Image::make($photo->getRealPath())->fit(350, 400);
        $thumb_img->save($destinationPath.'/'.$imagename,100);
                    
        $destinationPath = storage_path('app/public/upload/team');
        $photo->move($destinationPath, $imagename);

    	$team = new Team();
    	$team->name = $request->get('name');
        $team->position = $request->get('position');
    	$team->photo = $imagename;
    	$team->detail = $request->get('detail');
    	$team->save();

    	return redirect('/admin/team')
    		->withSuccess("The Team '$team->name' was created");
    }

    public function edit($id)
    {
    	$data = array(
    			'page_header'=>'Team',
    			'page_description'=>'Team Edit',
    		);
    	$team = Team::whereId($id)->firstOrFail();
    	return view('admin.team.edit',$data)->withTeam($team);
    }

    public function update(TeamEditRequest $request,$id)
    {
    	$team = Team::findOrFail($id);
        $photo = $request->file('photo');
        $oldPhoto = $request->get('oldPhoto');
        
        if(isset($photo)){
        /* Upload Image */    
        $time = date('YmdHis');
        $imagename = $oldPhoto; 
        $destinationPath = storage_path('app/public/upload/team/thumb');
        $thumb_img = Image::make($photo->getRealPath())->fit(270, 230);
        $thumb_img->save($destinationPath.'/'.$imagename,100);           
        $destinationPath = storage_path('app/public/upload/team');
        $photo->move($destinationPath, $imagename);
        $team->photo = $imagename;
        }
    	
        $team->name = $request->get('name');
        $team->position = $request->get('position');
    	$team->detail = $request->get('detail');
    	$team->save();

    	return redirect("/admin/team/$id/edit")
    		->withSuccess("The Team '$team->name' was updated");
    }

    public function destroy($id)
    {
    	$team = Team::findOrFail($id);
    	$team->delete();

    	return redirect('/admin/team')
    		->withSuccess("The Team '$team->name' was deleted");

    }
}
