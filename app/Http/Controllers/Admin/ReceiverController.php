<?php

namespace App\Http\Controllers\Admin;

use App\Receiver;
use App\ReceiverCompany;
use App\ReceiverType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReceiverController extends Controller
{
    public function index()
    {
        $receivers = Receiver::paginate(15);
        return view('admin.receiver.index')->with(compact('receivers'));
    }

    public function view($id)
    {
        if($id){
            $receiver = Receiver::findOrFail($id);
//            dd($receiver->receiverType->receiverSubType);
            return view('admin.receiver.view')->with(compact('receiver'));
        }

        return redirect('/admin');
    }

    public function getEdit($id)
    {
        if($id){
            $receiver = receiver::findOrFail($id);
            $companies = ReceiverCompany::all(['id', 'name']);
//            dd($receiver);
            return view('admin.receiver.edit')->with(compact('receiver', 'companies'));
        }

        return redirect('/admin/receivers');
    }

    public function postEdit($id, Request $request)
    {
        if($id){
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'contact_number' => 'required',
                'operation' => 'required',
                'company_id' => 'required',
                'description' => 'required',
                'status' => 'required',
            ]);
            $receiver = Receiver::findOrFail($id);
            $receiver->name = $request->name;
            $receiver->email = $request->email;
            $receiver->status = $request->status;
            $receiver->contact_number =  $request->contact_number;
            $receiver->description = $request->description;
            $receiver->company_id = $request->company_id;
            $receiver->operation = $request->operation;
            $receiver->save();

            \Session::flash('alert-success','receiver successfully Updated.');
            return redirect()->back();
        }

        return redirect('/admin');
    }

    public function create()
    {
        return view('admin.receiver.create');
    }

    public function createPost(Request $request)
    {
        $this->validate($request, [
            'number' => 'required|unique:receivers',
            'email' => 'required|email|unique:receivers',
            'status' => 'required',
        ]);

        $receiver = new receiver([
            'number' => $request->number,
            'email' => $request->email,
            'status' => $request->status
        ]);
        $receiver->save();

        \Session::flash('alert-success','receiver successfully Added.');
        return redirect()->route('receivers');
    }
}
