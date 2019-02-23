<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreIstaller as StoreInstallerRequest;
use App\Http\Requests\UpdateInstaller as UpdateInstallerRequest;
use App\Installer;
use Session;
use Gate;
use Auth;

class InstallerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $installers = Installer::orderBy('name','asc')->paginate(20);
       return view('installers.index')->with('installers', $installers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('installers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstallerRequest $request)
    {

        $data = $request->only('name', 'email', 'location');
        $installer = Installer::create($data);
        Session::flash('success','Installer successfuly published!');
        return redirect()->route('show_installer',$installer->id);
       
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $installer=Installer::find($id);
        return view('installers.show')->with('installer',$installer);

    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Installer $installer)
    {

        return view('installers.edit', compact('installer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Installer $installer, UpdateInstallerRequest $request)
    {
        

        $data = $request->only('name', 'email', 'location');
        $installer->fill($data)->save();

      Session::flash('success','Installer successfuly updated!');

        return view('installers.show')->with('installer',$installer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Installer $installer)
    {
    
        $installer->delete();

        return redirect('list_installers')->with('success', 'Installer has been deleted Successfully');
    }
}
