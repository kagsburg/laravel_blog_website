<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amenities;
use Illuminate\Support\Str;

class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amen=Amenities::orderBy('id','ASC')->paginate(10);
        return view('backend.amen.index')->with('amenities',$amen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.amen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'name'=>'string|required|max:300',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        $slug=Str::slug($request->title);
        $count=Amenities::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;
        $data['name'] = $request->get('name');
        $data['status'] = $request->get('status');
        $status=Amenities::create($data);
        if($status){
            request()->session()->flash('success','Amenities successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred while adding amenities');
        }
        return redirect()->route('amen.index');
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
        $amen=Amenities::findOrFail($id);
        return view('backend.amen.edit')->with('amen',$amen);
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
        $amen=Amenities::findOrFail($id);
        $this->validate($request,[
            'name'=>'string|required|max:300',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        // $slug=Str::slug($request->title);
        // $count=Amenities::where('slug',$slug)->count();
        // if($count>0){
        //     $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        // }
        // $data['slug']=$slug;
        $data['name'] = $request->get('name');
        $data['status'] = $request->get('status');
        // return $slug;
        // $path = $request->file('photo')->store('public/images');
        // $data['photo'] = $path; 
        $status=$amen->fill($data)->save();
        if($status){
            request()->session()->flash('success','Amenities successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred while updating amenities');
        }
        return redirect()->route('amen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $amen=Amenities::findOrFail($id);
        $status=$amen->delete();
        if($status){
            request()->session()->flash('success','Amenities successfully deleted');
        }
        else{
            request()->session()->flash('error','Error occurred while deleting amenities');
        }
        return redirect()->route('amen.index');
    }
}
