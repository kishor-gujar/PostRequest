<?php

namespace App\Http\Controllers\Admin;

use App\Priority;
use App\Receiver;
use App\ReceiverSubType;
use App\ReceiverType;
use App\RequestLine;
use App\RequestLink;
use App\State;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestLinkController extends Controller
{
    public function index()
    {
        $links = RequestLink::paginate(15);
//        dd(RequestLink::find(1)->requestLine);
        return view('admin.link.index')->with(compact('links'));
    }

    public function view($id)
    {
        if($id){
            $link = RequestLink::findOrFail($id);
//            dd($link->receiverSubType);
            return view('admin.link.view')->with(compact('link'));
        }
        return redirect('/admin');
    }

    public function getEdit($id)
    {
        if($id){
            $link = RequestLink::findOrFail($id);
            $receivers = Receiver::all('id', 'name');
            $receiverTypes = ReceiverType::all('id', 'type');
            $receiverSubTypes = ReceiverSubType::all('id', 'text');
            $requestLines = RequestLine::all('id', 'line');
            $states = State::all('id', 'name');
            $towns = Town::all('id', 'name');
            $priorities  = Priority::all('id', 'name');
            return view('admin.link.edit')->with(compact('link', 'receivers', 'receiverTypes', 'receiverSubTypes', 'requestLines', 'states', 'towns', 'priorities'));
        }
        return redirect('/admin/links');
    }

    public function postEdit($id, Request $request)
    {
        if($id){
            $this->validate($request, [
                'receiver_id' => 'required',
                'receiver_type_id' => 'required',
                'receiver_sub_type_id' => 'required',
                'request_line_id' => 'required',
                'number' => 'required',
                'email' => 'required|email',
                'preferred_notification' => 'required',
                'status' => 'required',
                'state_id' => 'required',
                'towns' => 'required',
                'priority_id' => 'required',
                'duration' => 'required'
            ]);
//            dd($request->all());
            $link = RequestLink::findOrFail($id);
            $link->receiver_id = $request->receiver_id;
            $link->receiver_type_id = $request->receiver_type_id;
            $link->receiver_sub_type_id = $request->receiver_sub_type_id;
            $link->request_line_id = $request->request_line_id;
            $link->number = $request->number;
            $link->email = $request->email;
            $link->preferred_notification = $request->preferred_notification;
            $link->status = $request->status;
            $link->state_id = $request->state_id;
            $link->towns = $request->towns;
            $link->duration = $request->duration;
            $link->priority_id = $request->priority_id;

            $duration = explode(' - ', $request->duration);
            $requestLinePrice = RequestLine::find($request->request_line_id)->price_per_month;
            $priorityPrice = Priority::find($request->priority_id)->amount;
            $datetime1 = new \DateTime($duration[0]);
            $datetime2 = new \DateTime($duration[1]);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
//            dd($days . ', '. $requestLinePrice . ', ' .$priorityPrice);
            $link->total_amount = (($days * $requestLinePrice) + $priorityPrice);

            $link->save();

            \Session::flash('alert-success','link successfully Updated.');
            return redirect()->back();
        }

        return redirect('/admin');
    }

    public function create()
    {    $receivers = Receiver::all('id', 'name');
        $receiverTypes = ReceiverType::all('id', 'type');
        $receiverSubTypes = ReceiverSubType::all('id', 'text');
        $requestLines = RequestLine::all('id', 'line');
        $states = State::all('id', 'name');
        $towns = Town::all('id', 'name');
        $priorities  = Priority::all('id', 'name');
        return view('admin.link.create')->with(compact( 'receivers', 'receiverTypes', 'receiverSubTypes', 'requestLines', 'states', 'towns', 'priorities'));
    }

    public function createPost(Request $request)
    {
        $this->validate($request, [
            'receiver_id' => 'required',
            'receiver_type_id' => 'required',
            'receiver_sub_type_id' => 'required',
            'request_line_id' => 'required',
            'number' => 'required',
            'email' => 'required|email',
            'preferred_notification' => 'required',
            'status' => 'required',
            'state_id' => 'required',
            'towns' => 'required',
            'priority_id' => 'required',
            'duration' => 'required'
        ]);
            $duration = explode(' - ', $request->duration);
            $requestLinePrice = RequestLine::find($request->request_line_id)->price_per_month;
            $priorityPrice = Priority::find($request->priority_id)->amount;
            $datetime1 = new \DateTime($duration[0]);
            $datetime2 = new \DateTime($duration[1]);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
            $ref = ReceiverType::find($request->receiver_type_id)->code;

//            TODO:: company and serial number for ref


        $link = new RequestLink([
            'receiver_id' => $request->receiver_id,
            'receiver_type_id' => $request->receiver_type_id,
            'receiver_sub_type_id' => $request->receiver_sub_type_id,
            'request_line_id' => $request->request_line_id,
            'number' => $request->number,
            'email' => $request->email,
            'preferred_notification' => $request->preferred_notification,
            'status' => $request->status,
            'state_id' => $request->state_id,
            'towns' => $request->towns,
            'priority_id' => $request->priority_id,
            'duration' => $request->duration,
            'total_amount' =>  (($days * $requestLinePrice) + $priorityPrice),
            'ref' => $ref

        ]);
//        dd($link);
        $link->save();

        \Session::flash('alert-success','link successfully Added.');
        return redirect()->route('links');
    }
}
