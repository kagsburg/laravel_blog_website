<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service=Service::orderBy('id','DESC')->paginate(10);
        return view('backend.service.index')->with('services',$service);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'string|required',
            'status'=>'required|in:active,inactive',
            'summary'=>'string|nullable',
            'photo'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $data=$request->all();
        $slug=Str::slug($request->title);
        $count=Service::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;
        $data['summary'] = $request->get('summary');
        $path = $request->file('photo')->store('public/images');
        $data['photo'] = $path; 
        $status=Service::create($data);
        if($status){
            request()->session()->flash('success','Service Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('service.index');
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
        $service=Service::findOrFail($id);
        return view('backend.service.edit')->with('service',$service);
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
        $service=Service::findOrFail($id);
         // return $request->all();
         $this->validate($request,[
            'title'=>'string|required',
            'status'=>'required|in:active,inactive',
            'summary'=>'string|nullable',
            'photo'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $data=$request->all();
        $data['summary'] = $request->get('summary');
        $path = $request->file('photo')->store('public/images');
        $data['photo'] = $path; 
        $status=$service->fill($data)->save();
        if($status){
            request()->session()->flash('success','Service Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service=Service::findOrFail($id);
       
        $status=$service->delete();
        
        if($status){
            request()->session()->flash('success','Service successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting service');
        }
        return redirect()->route('service.index');
    }
}
