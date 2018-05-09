<?php

namespace App\Http\Controllers\Admin;

use \App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TownController extends Controller
{
    public function index()
    {
        $towns = Town::paginate(15);
        return view('admin.town.index')->with(compact('towns'));
    }

    public function view($id)
    {
        if($id){
            $town = town::findOrFail($id);
            return view('admin.town.view')->with(compact('town'));
        }

        return redirect('/admin');
    }

    public function getEdit($id)
    {
        if($id){
            $town = town::findOrFail($id);
//            dd($town);
            return view('admin.town.edit')->with(compact('town'));
        }

        return redirect('/admin/towns');
    }

    public function postEdit($id, Request $request)
    {
        if($id){
            $this->validate($request, [
                'name' => 'required'
            ]);
            $town = town::findOrFail($id);
            $town->name = $request->name;
            $town->save();

            \Session::flash('alert-success','town successfully Updated.');
            return redirect()->back();
        }

        return redirect('/admin');
    }

    public function create()
    {
        return view('admin.town.create');
    }

    public function createPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:towns',
        ]);

        $town = new town([
            'name' => $request->name,
        ]);
        $town->save();

        \Session::flash('alert-success','town successfully Added.');
        return redirect()->route('towns');
    }
}
