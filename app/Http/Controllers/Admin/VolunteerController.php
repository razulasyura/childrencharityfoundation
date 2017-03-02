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
use App\Http\Requests\VolunteerCreateRequest;
use App\Http\Requests\VolunteerEditRequest;
use App\Volunteer;

class VolunteerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	// for title, breadcrumb
    	$data = array(
    			'page_header'=>'Volunteer',
    			'page_description'=>'Volunteer Index',
    		);
    	$volunteers = Volunteer::all();
    	return view('admin.volunteer.index',$data)
    			->withVolunteers($volunteers);
    }

    public function create()
    {
    	$data = array(
    			'page_header'=>'Volunteer',
    			'page_description'=>'Volunteer Create',
    		);
    	return view('admin.volunteer.create',$data);
    }

    public function store(VolunteerCreateRequest $request)
    {
    	$volunteer = new Volunteer();
    	$volunteer->name = $request->get('name');
    	$volunteer->phone = $request->get('phone');
    	$volunteer->email = $request->get('email');
    	$volunteer->address = $request->get('address');
    	$volunteer->save();

    	return redirect('/admin/volunteer')
    		->withSuccess("The Volunteer '$volunteer->name' was created");
    }

    public function edit($id)
    {
    	$data = array(
    			'page_header'=>'Volunteer',
    			'page_description'=>'Volunteer Edit',
    		);
    	$volunteer = Volunteer::whereId($id)->firstOrFail();
    	return view('admin.volunteer.edit',$data)->withVolunteer($volunteer);
    }

    public function update(VolunteerEditRequest $request,$id)
    {
    	$volunteer = Volunteer::findOrFail($id);
    	$volunteer->name = $request->get('name');
    	$volunteer->phone = $request->get('phone');
    	$volunteer->email = $request->get('email');
    	$volunteer->address = $request->get('address');
    	$volunteer->save();

    	return redirect("/admin/volunteer/$id/edit")
    		->withSuccess("The Volunteer '$volunteer->name' was updated");
    }

    public function destroy($id)
    {
    	$volunteer = Volunteer::findOrFail($id);
    	$volunteer->delete();

    	return redirect('/admin/volunteer')
    		->withSuccess("The Volunteer '$volunteer->name' was deleted");
    }
}
