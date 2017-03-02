<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\User;

class UserController extends Controller
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
                'page_header'=>'User',
                'page_description'=>'User Index',
            );
        $users = User::all();
        return view('admin.user.index',$data)
            ->withUsers($users);
    }

    public function edit($id)
    {
        $data = array(
                'page_header'=>'User',
                'page_description'=>'User Edit',
            );
        $user = User::whereId($id)->firstOrFail();
        return view('admin.user.edit',$data)->withUser($user);
    }

    public function update(UserEditRequest $request,$id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect("/admin/user/$id/edit")
            ->withPassword("The user '$user->name' was updated");  
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/admin/user')
            ->withSuccess("User '$user->name' was deleted");
    }
}
