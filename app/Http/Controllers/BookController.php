<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name'=>'string|required|min:2',
            // 'last_name'=>'string|required|min:2',
            'email'=>'email|required',
            // 'phone'=>'numeric|required',
            'arrival_date'=>'string|required',
            'departure_date'=>'string|required',
            'country'=>'string|required',
            // 'post_code'=>'string|nullable',
            // 'address1'=>'string|required',
            // 'fax'=>'string|required',
            'number_of_adults'=>'string|required',
            'room_id'=>'nullable|required'
            
        ]);
        // return $request->all();

        $order=Order::create($request->all());
            // return $order;
        $data=array();
        $data['url']=route('order.show',$order->id);
        $data['date']=$order->created_at->format('F d, Y h:i A');
        $data['name']=$order->name;
        // $data['last_name']=$order->last_name;
        $data['email']=$order->email;
        // $data['phone']=$order->phone;
        $data['arrival_date']=$order->arrival_date;
        $data['departure_date']=$order->departure_date;
        $data['country']=$order->country;
        // $data['postcode']=$order->postcode;
        // $data['address1']=$order->address1;
        $data['room_id']=$order->room_id;
        $data['number_of_adults']=$order->number_of_adults;
        // $data['number_of_kids']=$order->number_of_kids;
        // $data['photo']=Auth()->user()->photo;

        if($order){
            request()->session()->flash('success','Booking Successfully sent');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
