<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Room;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image=Image::orderBy('id','DESC')->paginate(10);
        return view('backend.image.index')->with('images',$image);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms=Room::get();
        return view('backend.image.create')
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
        $messages = [
            'required' => 'Please select file to upload',
        ];
  
        $this->validate($request, [
            'file' => 'required',
            'room_id'=>'required',
            'status'=>'required',
        ], $messages);

        // dd($request);
  
        foreach ($request->file as $file) {
            $filename = time().'_'.$file->getClientOriginalName();
            $filesize = $file->getSize();
            $file->storeAs('public/',$filename);
            
            $fileModel = new Image();
            $fileModel->name = $filename;
            $fileModel->size = $filesize;
            $fileModel->path = 'storage/'.$filename;
            $fileModel->room_id = $request->room_id;
            $fileModel->status = $request->status;
           
            $fileModel->save();          
        }
        return redirect()->route('image.index');

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
        $image=Image::findOrFail($id);
        $rooms=Room::get();
        return view('backend.image.edit')
                    ->with('image',$image)
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
        $messages = [
            'required' => 'Please select file to upload',
        ];
  
        $this->validate($request, [
            // 'file' => 'required',
            'room_id'=>'required',
            'status'=>'required',
        ], $messages);

        $got_img = Image::findOrFail($id);

        if(!$got_img){
            redirect()->back()->with('danger','Image doesn\'t exist');
        }

        $got_img->update($request->all());
    
        return redirect()->route('image.index')->with('success','Image updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image=Image::findOrFail($id);
        $status=$image->delete();
        
        if($status){
            request()->session()->flash('success','Image successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting image');
        }
        return redirect()->route('image.index');
    }
}
