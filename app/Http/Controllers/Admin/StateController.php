<?php

namespace App\Http\Controllers\Admin;

use App\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
    public function index()
    {
        $states = State::paginate(15);
        return view('admin.state.index')->with(compact('states'));
    }

    public function view($id)
    {
        if($id){
            $state = state::findOrFail($id);
            return view('admin.state.view')->with(compact('state'));
        }

        return redirect('/admin');
    }

    public function getEdit($id)
    {
        if($id){
            $state = state::findOrFail($id);
//            dd($state);
            return view('admin.state.edit')->with(compact('state'));
        }

        return redirect('/admin/states');
    }

    public function postEdit($id, Request $request)
    {
        if($id){
            $this->validate($request, [
                'name' => 'required'
            ]);
            $state = State::findOrFail($id);
            $state->name = $request->name;
            $state->save();

            \Session::flash('alert-success','State successfully Updated.');
            return redirect()->back();
        }

        return redirect('/admin');
    }

    public function create()
    {
        return view('admin.state.create');
    }

    public function createPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:states',
        ]);

        $state = new state([
            'name' => $request->name,
        ]);
        $state->save();

        \Session::flash('alert-success','state successfully Added.');
        return redirect()->route('states');
    }
}
