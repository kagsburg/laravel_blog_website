<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimony;
use Illuminate\Support\Str;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonial=Testimony::orderBy('id','DESC')->paginate(10);
        return view('backend.testimonial.index')->with('testimonials',$testimonial);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.testimonial.create');
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
            'name'=>'string|required|max:30',
            'message'=>'string|nullable',
            'photo'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        $slug=Str::slug($request->title);
        $count=Testimony::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;
        $data['name'] = $request->get('name');
        $data['message'] = $request->get('message');
        $data['status'] = $request->get('status');
        // return $slug;
        $path = $request->file('photo')->store('public/images');
        $data['photo'] = $path; 
        $status=Testimony::create($data);
        if($status){
            request()->session()->flash('success','Testimonial successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred while adding testimonial');
        }
        return redirect()->route('testimonial.index');
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
        $testimonial=Testimony::findOrFail($id);
        return view('backend.testimonial.edit')->with('testimonial',$testimonial);
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
        $testimonial=Testimony::findOrFail($id);
        $this->validate($request,[
            'name'=>'string|required|max:30',
            'message'=>'string|nullable',
            'photo'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        // $slug=Str::slug($request->title);
        // $count=Banner::where('slug',$slug)->count();
        // if($count>0){
        //     $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        // }
        // $data['slug']=$slug;
        $data['name'] = $request->get('name');
        $data['message'] = $request->get('message');
        $data['status'] = $request->get('status');
        // return $slug;
        $path = $request->file('photo')->store('public/images');
        $data['photo'] = $path; 
        $status=$testimonial->fill($data)->save();
        if($status){
            request()->session()->flash('success','Testimonial successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred while updating testimonial');
        }
        return redirect()->route('testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial=Testimony::findOrFail($id);
        $status=$testimonial->delete();
        if($status){
            request()->session()->flash('success','Testimonial successfully deleted');
        }
        else{
            request()->session()->flash('error','Error occurred while deleting testimonial');
        }
        return redirect()->route('testimonial.index');
    }
}
