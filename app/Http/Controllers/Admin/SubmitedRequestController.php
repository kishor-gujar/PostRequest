<?php

namespace App\Http\Controllers\Admin;
use App\SubmitedRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubmitedRequestController extends Controller
{
    public function index()
    {
        $requests = SubmitedRequest::paginate(15);
//        dd($requests);
        return view('admin.submitedrequest.index')->with(compact('requests'));
    }

    public function view($id)
    {
        if($id){
            $request = SubmitedRequest::findOrFail($id);
//            dd($request->requester);
            return view('admin.submitedrequest.view')->with(compact('request'));
        }

        return redirect('/admin');
    }

    public function getEdit($id)
    {
        if($id){
            $request = SubmitedRequest::findOrFail($id);
        //    dd($request);
            return view('admin.submitedrequest.edit')->with(compact('request'));
        }

        return redirect('/admin/Request');
    }

    public function postEdit($id, Request $request)
    {
        if($id){
            $this->validate($request, [
                'sub_type' => 'required',
                'state' => 'required',
                'town' => 'required',
                'line' => 'required',
                'status' => 'required',
            ]);
            
            $srequest = SubmitedRequest::findOrFail($id);

            $srequest->sub_type = $request->sub_type;
            $srequest->state = $request->state;
            $srequest->town = $request->town;
            $srequest->line = $request->line;
            $srequest->status = $request->status;
            $srequest->save();

            \Session::flash('alert-success','request successfully Updated.');
            return redirect()->back();
        }

        return redirect('/admin');
    }

    public function create()
    {
        return view('admin.Submitedrequest.create');
    }

    public function createPost(Request $request)
    {
        $this->validate($request, [
            'number' => 'required|unique:Request',
            'email' => 'required|email|unique:Request',
            'status' => 'required',
        ]);

        $srequest = new SubmitedRequest([
            'number' => $request->number,
            'email' => $request->email,
            'status' => $request->status
        ]);
        $srequest->save();

        \Session::flash('alert-success','request successfully Added.');
        return redirect()->route('request');
    }
}
