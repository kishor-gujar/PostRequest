<?php

namespace App\Http\Controllers\Admin;

use App\ReceiverSubType;
use App\ReceiverType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ReceiverSubTypeController extends Controller
{
    public function index()
    {
       $receiverSubTypes = ReceiverSubType::paginate(15);
        return view('admin.receiverSubType.index')->with(compact('receiverSubTypes'));
    }

    public function view($id)
    {
        if ($id) {
           $receiverSubType = ReceiverSubType::findOrFail($id);
//            dd($request->requester);
            return view('admin.receiverSubType.view')->with(compact('receiverSubType'));
        }

        return redirect('/admin');
    }
    public function getEdit($id)
    {
        if($id){
            $receiverTypes = ReceiverType::all(['id', 'type']);

           $receiverSubType = ReceiverSubType::findOrFail($id);
            //    dd($request);
            return view('admin.receiverSubType.edit')->with(compact('receiverSubType','receiverTypes'));
        }

        return redirect('/admin/Request');
    }

    public function postEdit($id, Request $request)
    {
        if($id){
            $this->validate($request, [
                'text' => 'required',
                'receiver_type_id' => 'required',
                'description' => 'required',
                'status' => 'required',
                'image' => ''
            ]);
            $receiverSubType = ReceiverSubType::findOrFail($id);
           if (Input::hasFile('image')) {
               $file = Input::file('image');
               $file->move('uploads', $file->getClientOriginalName());
               $receiverSubType->image = '/uploads/'.$file->getClientOriginalName();
           }

           $receiverSubType->text = $request->text;
           $receiverSubType->receiver_type_id = $request->receiver_type_id;
           $receiverSubType->description = $request->description;
           $receiverSubType->status = $request->status;
           $receiverSubType->save();

            \Session::flash('alert-success','Receiver sub Type successfully Updated.');
            return redirect()->back();
        }

        return redirect('/admin');
    }

    public function create()
    {
        $receiverTypes = ReceiverType::all(['id', 'type']);
        return view('admin.receiverSubType.create')->with(compact('receiverTypes'));
    }

    public function createPost(Request $request)
    {
        $this->validate($request, [
            'text' => 'required',
            'receiver_type_id' => 'required',
            'description' => 'required',
            'status' => 'required',
            'image' => 'required'
        ]);
        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $file->move('uploads', $file->getClientOriginalName());
            $receiverSubType = new ReceiverSubType([
                'text' => $request->text,
                'receiver_type_id' => $request->receiver_type_id,
                'description' => $request->description,
                'status' => $request->status,
                'image' =>'/uploads/'.$file->getClientOriginalName()
            ]);
        }

       $receiverSubType->save();

        \Session::flash('alert-success','ReceiverSubType successfully Added.');
        return redirect()->route('receiver.sub.types');
    }
}
