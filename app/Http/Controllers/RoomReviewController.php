<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Notification;
use App\Notifications\StatusNotification;
use App\User;
use App\Models\RoomReview;
class RoomReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews=RoomReview::getAllReview();
        
        return view('backend.review.index')->with('reviews',$reviews);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'rate'=>'required|numeric|min:1'
        ]);
        $room_info=Room::getRoomBySlug($request->slug);
        //  return $room_info;
        // return $request->all();
        $data=$request->all();
        $data['room_id']=$room_info->id;
        $data['user_id']=$request->user()->id;
        $data['status']='active';
        // dd($data);
        $status=RoomReview::create($data);

        $user=User::where('role','admin')->get();
        $details=[
            'title'=>'New Room Rating!',
            'actionURL'=>route('room-detail',$room_info->slug),
            'fas'=>'fa-star'
        ];
        Notification::send($user,new StatusNotification($details));
        if($status){
            request()->session()->flash('success','Thank you for your feedback');
        }
        else{
            request()->session()->flash('error','Something went wrong! Please try again!!');
        }
        return redirect()->back();
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
        $review=RoomReview::find($id);
        // return $review;
        return view('backend.review.edit')->with('review',$review);
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
        $review=RoomReview::find($id);
        if($review){
            // $room_info=Room::getRoomBySlug($request->slug);
            //  return $room_info;
            // return $request->all();
            $data=$request->all();
            $status=$review->fill($data)->update();

            // $user=User::where('role','admin')->get();
            // return $user;
            // $details=[
            //     'title'=>'Update Room Rating!',
            //     'actionURL'=>route('room-detail',$room_info->id),
            //     'fas'=>'fa-star'
            // ];
            // Notification::send($user,new StatusNotification($details));
            if($status){
                request()->session()->flash('success','Review Successfully updated');
            }
            else{
                request()->session()->flash('error','Something went wrong! Please try again!!');
            }
        }
        else{
            request()->session()->flash('error','Review not found!!');
        }

        return redirect()->route('review.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review=RoomReview::find($id);
        $status=$review->delete();
        if($status){
            request()->session()->flash('success','Successfully deleted review');
        }
        else{
            request()->session()->flash('error','Something went wrong! Try again');
        }
        return redirect()->route('review.index');
    }
}
