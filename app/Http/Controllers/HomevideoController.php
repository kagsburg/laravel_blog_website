<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homevideo;
use Illuminate\Support\Str;

class HomevideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homvid=Homevideo::orderBy('id','DESC')->paginate(10);
        return view('backend.homevideo.index')->with('homvids',$homvid);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.homevideo.create');
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
            'link'=>'string|required|max:100',
            'status'=>'required|in:active,inactive',
        ]);

        $data=$request->all();
        $data['link'] = $request->get('link');
        $slug=Str::slug($request->title);
        $count=Homevideo::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;
        $data['status'] = $request->get('status');
        $status=Homevideo::create($data);
        if($status){
            request()->session()->flash('success','Home Video Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('homevideo.index');
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
        $homvid=Homevideo::findOrFail($id);
        return view('backend.homevideo.edit')
                    ->with('homvid',$homvid);
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
        $homvid=Homevideo::findOrFail($id);
        $this->validate($request,[
            'link'=>'string|required|max:100',
            'status'=>'required|in:active,inactive',
        ]);

        $data=$request->all();
        $data['link'] = $request->get('link');
        $data['status'] = $request->get('status');
        $status=$homvid->fill($data)->save();
        if($status){
            request()->session()->flash('success','Home Video Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('homevideo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homvid=Homevideo::findOrFail($id);
        $status=$homvid->delete();
        
        if($status){
            request()->session()->flash('success','Home Video successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting home video');
        }
        return redirect()->route('homevideo.index');
    }
}
