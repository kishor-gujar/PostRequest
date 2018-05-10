<?php

namespace App\Http\Controllers\Admin;

use App\Advertiser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class AdvertiserController extends Controller
{
    public function index()
    {
        $advertisers = Advertiser::paginate(15);
        return view('admin.advertiser.index')->with(compact('advertisers'));
    }

    public function view($id)
    {
        if($id){
            $advertiser = Advertiser::findOrFail($id);
            return view('admin.advertiser.view')->with(compact('advertiser'));
        }

        return redirect('/admin');
    }

    public function getEdit($id)
    {
        if($id){
            $advertiser = Advertiser::findOrFail($id);
//            dd($advertiser);
            return view('admin.advertiser.edit')->with(compact('advertiser'));
        }

        return redirect('/admin/advertisers');
    }

    public function postEdit($id, Request $request)
    {
        if($id){
            $this->validate($request, [
                'name' => 'required',
                'number' => ['required', Rule::unique('advertisers')->ignore($id)],
                'email' => ['required','email', Rule::unique('advertisers')->ignore($id)],
                'address' => 'required',
                'contact_person' => 'required',
                'status' => 'required',
            ]);
            $advertiser = Advertiser::findOrFail($id);

            $advertiser->name = $request->name;
            $advertiser->number = $request->number;
            $advertiser->email = $request->email;
            $advertiser->address = $request->address;
            $advertiser->contact_person = $request->contact_person;
            $advertiser->status = $request->status;
            $advertiser->save();

            \Session::flash('alert-success','advertiser successfully Updated.');
            return redirect()->back();
        }

        return redirect('/admin');
    }

    public function create()
    {
        return view('admin.advertiser.create');
    }

    public function createPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'number' => 'required|unique:advertisers',
            'email' => 'required|email|unique:advertisers',
            'address' => 'required',
            'contact_person' => 'required',
            'status' => 'required',
        ]);

        $advertiser = new advertiser([
           'name' => $request->name,
           'number' => $request->number,
           'email' => $request->email,
           'address' => $request->address,
           'contact_person' => $request->contact_person,
           'status' => $request->status,
        ]);
        $advertiser->save();

        \Session::flash('alert-success','advertiser successfully Added.');
        return redirect()->route('advertisers');
    }
}
