<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Veterinarian;
use App\Http\Requests\VeterinarianCreateRequest;
use App\Http\Requests\VeterinarianEditRequest;

class VeterinarianController extends Controller
{
    var $filename = 'veterinarian';

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
                'page_header'=> ucfirst($this->filename),
                'page_description'=>'Sukarelawan Dokter - Index',
                $this->filename.'s'=> Veterinarian::all()
            );
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
                'page_header'=> ucfirst($this->filename),
                'page_description'=>'Sukarelawan Dokter - Create',
            );

        return view('admin/'.$this->filename.'/create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VeterinarianCreateRequest $request)
    {
        $var = new Veterinarian();
        $var->name = $request->get('name');
        $var->phone = $request->get('phone');
        $var->email = $request->get('email');
        $var->address = $request->get('address');
        $var->save();

        return redirect("/admin/$this->filename")
            ->withSuccess("$this->filename '$var->name' was created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
                'page_header'=> ucfirst($this->filename),
                'page_description'=>'Sukarelawan Dokter - Edit',
                $this->filename => Veterinarian::whereId($id)->firstOrFail()
            );
        return view('admin/'.$this->filename.'/edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VeterinarianEditRequest $request, $id)
    {
        $var = Veterinarian::findOrFail($id);
        $var->name = $request->get('name');
        $var->phone = $request->get('phone');
        $var->email = $request->get('email');
        $var->address = $request->get('address');
        $var->save();

        return redirect("/admin/$this->filename/$id/edit")
            ->withSuccess("Veterinarian '$var->name' was updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $var = Vetenarian::findOrFail($id);
        $var->delete();

        return redirect("/admin/$this->filename")
            ->withSuccess("Veterinarian '$var->name' was deleted");
    }
}
