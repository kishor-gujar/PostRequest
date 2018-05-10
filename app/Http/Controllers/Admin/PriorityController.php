<?php

namespace App\Http\Controllers\Admin;

use App\Priority;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PriorityController extends Controller
{
    public function index()
    {
        $priorities = Priority::paginate(15);
        return view('admin.priority.index')->with(compact('priorities'));
    }

    public function view($id)
    {
        if($id){
            $priority = priority::findOrFail($id);
            return view('admin.priority.view')->with(compact('priority'));
        }

        return redirect('/admin');
    }

    public function getEdit($id)
    {
        if($id){
            $priority = priority::findOrFail($id);
//            dd($priority);
            return view('admin.priority.edit')->with(compact('priority'));
        }

        return redirect('/admin/prioritys');
    }

    public function postEdit($id, Request $request)
    {
        if($id){
            $this->validate($request, [
                'name' => 'required',
                'amount' => 'required',
                'status' => 'required',
            ]);
            $priority = priority::findOrFail($id);

            $priority->name = $request->name;
            $priority->status = $request->status;
            $priority->amount = $request->amount;
            $priority->save();

            \Session::flash('alert-success','Priority successfully Updated.');
            return redirect()->back();
        }

        return redirect('/admin');
    }

    public function create()
    {
        return view('admin.priority.create');
    }

    public function createPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'amount' => 'required',
            'status' => 'required',
        ]);

        $priority = new priority([
            'name' => $request->name,
            'amount' => $request->amount,
            'status' => $request->status
        ]);
        $priority->save();

        \Session::flash('alert-success','priority successfully Added.');
        return redirect()->route('priorities');
    }
}
