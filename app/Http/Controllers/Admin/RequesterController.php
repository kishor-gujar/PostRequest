<?php

namespace App\Http\Controllers\Admin;

use App\Requester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class RequesterController extends Controller
{
    public function index()
    {
        $requesters = Requester::paginate(15);
        return view('admin.requester.index')->with(compact('requesters'));
    }

    public function view($id)
    {
        if($id){
            $requester = Requester::findOrFail($id);
            return view('admin.requester.view')->with(compact('requester'));
        }

        return redirect('/admin');
    }

    public function getEdit($id)
    {
        if($id){
            $requester = Requester::findOrFail($id);
//            dd($requester);
            return view('admin.requester.edit')->with(compact('requester'));
        }

        return redirect('/admin/requesters');
    }

    public function postEdit($id, Request $request)
    {
        if($id){
            $this->validate($request, [
                'number' => ['required', Rule::unique('requesters')->ignore($id)],
                'email' => ['required','email', Rule::unique('requesters')->ignore($id)],
                'status' => 'required',
                'name' => 'required'
            ]);
            $requester = Requester::findOrFail($id);

            $requester->number = $request->number;
            $requester->email = $request->email;
            $requester->status = $request->status;
            $requester->name = $request->name;
            $requester->save();

            \Session::flash('alert-success','Requester successfully Updated.');
            return redirect()->back();
        }

        return redirect('/admin');
    }

    public function create()
    {
        return view('admin.requester.create');
    }

    public function createPost(Request $request)
    {
        $this->validate($request, [
            'number' => 'required|unique:requesters',
            'email' => 'required|email|unique:requesters',
            'status' => 'required',
        ]);

        $requesters = new Requester([
            'number' => $request->number,
            'email' => $request->email,
            'status' => $request->status
        ]);
        $requesters->save();

        \Session::flash('alert-success','Requester successfully Added.');
        return redirect()->route('requesters');
    }
}























