<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Room;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video=Video::orderBy('id','DESC')->paginate(10);
        return view('backend.video.index')->with('videos',$video);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms=Room::get();
        return view('backend.video.create')
            ->with('rooms',$rooms);
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
            'room_id'=>'required',
            'link'=>'string|required|max:100',
            'status'=>'required|in:active,inactive',
        ]);

        $data=$request->all();
        $data['room_id'] = $request->get('room_id');
        $data['link'] = $request->get('link');
        $slug=Str::slug($request->title);
        $count=Video::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;
        $data['status'] = $request->get('status');
        $status=Video::create($data);
        if($status){
            request()->session()->flash('success','Video Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('video.index');
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
        $video=Video::findOrFail($id);
        $rooms=Room::get();
        return view('backend.video.edit')
                    ->with('video',$video)
                    ->with('rooms',$rooms);
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
        $video=Video::findOrFail($id);
        $this->validate($request,[
            'room_id'=>'required',
            'link'=>'string|required|max:100',
            'status'=>'required|in:active,inactive',
        ]);

        $data=$request->all();
        $data['room_id'] = $request->get('room_id');
        $data['link'] = $request->get('link');
        $data['status'] = $request->get('status');
        $status=$video->fill($data)->save();
        if($status){
            request()->session()->flash('success','Video Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('video.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video=Video::findOrFail($id);
        $status=$video->delete();
        
        if($status){
            request()->session()->flash('success','Video successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting video');
        }
        return redirect()->route('video.index');
    }
}
