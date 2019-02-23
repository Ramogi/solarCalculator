<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreService as StoreServiceRequest;
use App\Http\Requests\UpdateService as UpdateServiceRequest;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Service;
use Gate;
use Auth;
use Session;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $services = Service::orderBy('name','asc')->paginate(10);
       return view('services.index')->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
       
        $data = $request->only('name');
        $service = Service::create($data);
        $service->save();
        Session::flash('success','Service successfuly published!');

        return redirect()->route('show_service',$service->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service=Service::find($id);
        return view('services.show')->with('service',$service);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        
        return view('services.edit')->with('service',$service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Service $service, UpdateServiceRequest $request)
    {
        

        $data = $request->only('name');
        $service->fill($data)->save();
        Session::flash('success','Service successfuly published!');

        return redirect()->route('services.show')->with('service',$service);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        Session::flash('success','Service successfuly deleted!');

        return redirect()->route('list_services');
    }
}
