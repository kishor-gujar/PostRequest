<?php

namespace App\Http\Controllers\Admin;

use App\ReceiverType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReceiverTypeController extends Controller
{
    public function index()
    {
        $receiverTypes = ReceiverType::paginate(15);
//       dd($receiverTypes);
        return view('admin.receivertype.index')->with(compact('receiverTypes'));
    }

    public function view($id)
    {
        if ($id) {
            $receiverType = ReceiverType::findOrFail($id);
//            dd($request->requester);
            return view('admin.receivertype.view')->with(compact('receiverType'));
        }

        return redirect('/admin');
    }
    public function getEdit($id)
    {
        if($id){
            $receiverType = ReceiverType::findOrFail($id);
            //    dd($request);
            return view('admin.receivertype.edit')->with(compact('receiverType'));
        }

        return redirect('/admin/Request');
    }

    public function postEdit($id, Request $request)
    {
        if($id){
            $this->validate($request, [
                'type' => 'required',
                'code' => 'required',
                'description' => 'required',
                'status' => 'required'
            ]);

            $receiverType = ReceiverType::findOrFail($id);
            $receiverType->type = $request->type;
            $receiverType->code = $request->code;
            $receiverType->description = $request->description;
            $receiverType->status = $request->status;
            $receiverType->save();

            \Session::flash('alert-success','Receiver Type successfully Updated.');
            return redirect()->back();
        }

        return redirect('/admin');
    }

    public function create()
    {
        return view('admin.receivertype.create');
    }

    public function createPost(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'code' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $receiverType = new ReceiverType([
            'type' => $request->type,
            'code' => $request->code,
            'description' => $request->description,
            'status' => $request->status
        ]);
        $receiverType->save();

        \Session::flash('alert-success','Request receiverType successfully Added.');
        return redirect()->route('receiver-types');
    }
}
