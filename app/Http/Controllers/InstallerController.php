<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Installer;
use Session;

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
    public function store(Request $request)
    {
        $request->validate([
        'name'=>'required',
        'email'=> 'required|string',
        'location' => 'required|string'
      ]);
      $installer = new Installer([
        'name' => $request->get('name'),
        'email'=> $request->get('email'),
        'location'=> $request->get('location')
      ]);
      $installer->save();
      return redirect('/installers')->with('success', 'Installer has been added');
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
    public function edit($id)
    {
        $installer = Installer::find($id);

        return view('installers.edit', compact('installer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'name'=>'required',
        'email'=> 'required',
        'location' => 'required'
      ]);

      $installer = Installer::find($id);
      $installer->name = $request->get('name');
      $installer->email = $request->get('email');
      $installer->location = $request->get('location');
      $installer->save();

      Session::flash('success','Installer successfuly updated!');

        return redirect()->route('installers.show',$installer->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $installer = Installer::find($id);
        $installer->delete();

        return redirect('/installers')->with('success', 'Installer has been deleted Successfully');
    }
}
