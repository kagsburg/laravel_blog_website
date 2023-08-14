<?php

namespace App\Http\Controllers;

use App\Models\Amenities;
use Illuminate\Http\Request;
use App\Models\Room;

use Illuminate\Support\Str;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms=Room::getAllRoom();
        // return $rooms;
        return view('backend.room.index')->with('rooms',$rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $amenities=Amenities::orderBy('name','ASC')->get();
        return view('backend.room.create')
            ->with('amenities',$amenities);
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
            'title'=>'string|required',
            'description'=>'string|nullable',
            'is_featured'=>'sometimes|in:1',
            'price'=>'required|numeric',
            'discount'=>'nullable|numeric',
            'amenities'=>'nullable|max:300',
            'photo'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        $slug=Str::slug($request->title);
        $count=Room::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;
        $data['title'] = $request->get('title');
        $data['description'] = $request->get('description');
        $data['is_featured'] = $request->get('is_featured');
        $data['price'] = $request->get('price');
        $data['discount'] = $request->get('discount');
        $data['status'] = $request->get('status');

        $amenities=$request->input('amenities');
        if($amenities){
            $data['amenities']=implode(',',$amenities);
        }
        else{
            $data['amenities']='';
        }

        // return $slug;
        $path = $request->file('photo')->store('public/images');
        $data['photo'] = $path; 
        $status=Room::create($data);
        if($status){
            request()->session()->flash('success','Room successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred while adding room');
        }
        return redirect()->route('room.index');

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
        $room=Room::findOrFail($id);
        $items=Room::where('id',$id)->get();
        $amenities=Amenities::get();
        // return $items;
        return view('backend.room.edit')
            ->with('room',$room)
            ->with('items',$items)
            ->with('amenities',$amenities);
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

        $room=Room::findOrFail($id);
        $this->validate($request,[
            'title'=>'string|required|max:50',
            'photo'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description'=>'string|nullable',
            'is_featured'=>'sometimes|in:1',
            'price'=>'required|numeric',
            'amenities'=>'nullable',
            'discount'=>'nullable|numeric',
            'status'=>'required|in:active,inactive',
        ]);

        $data=$request->all();
        $data['title'] = $request->get('title');
        $data['description'] = $request->get('description');
        $data['is_featured'] = $request->get('is_featured');
        $data['price'] = $request->get('price');
        $data['discount'] = $request->get('discount');
        $data['amenities_id'] = $request->get('amenities_id');
        $data['status'] = $request->get('status');

        $amenities=$request->input('amenities');
        if($amenities){
            $data['amenities']=implode(',',$amenities);
        }
        else{
            $data['amenities']='';
        }

        // return $data;
        $path = $request->file('photo')->store('public/images');
        $data['photo'] = $path;
        $status=$room->fill($data)->save();
        if($status){
            request()->session()->flash('success','Room Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room=Room::findOrFail($id);
        $status=$room->delete();
        
        if($status){
            request()->session()->flash('success','Room successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting room');
        }
        return redirect()->route('room.index');
    }
}
