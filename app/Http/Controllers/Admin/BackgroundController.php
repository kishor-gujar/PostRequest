<?php

namespace App\Http\Controllers\Admin;

use App\Advertiser;
use App\Background;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class BackgroundController extends Controller
{
    public function index()
    {
        $backgrounds = Background::paginate(15);
        return view('admin.background.index')->with(compact('backgrounds'));
    }

    public function view($id)
    {
        if ($id) {
            $background = background::findOrFail($id);
//            dd($request->requester);
            return view('admin.background.view')->with(compact('background'));
        }

        return redirect('/admin');
    }
    public function getEdit($id)
    {
        if($id){
            $advertisers  = Advertiser::all(['id', 'name']);

            $background = background::findOrFail($id);
            //    dd($request);
            return view('admin.background.edit')->with(compact('background','advertisers'));
        }

        return redirect('/admin/Request');
    }

    public function postEdit($id, Request $request)
    {
        if($id){
            $this->validate($request, [
                'name' => 'required',
                'advertiser_id' => 'required',
                'image' => '',
                'text' => 'required',
                'external_link' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'status' => 'required',
            ]);
            $background = Background::findOrFail($id);
            if (Input::hasFile('image')) {
                $file = Input::file('image');
                $file->move('uploads', $file->getClientOriginalName());
                $background->image = '/uploads/'.$file->getClientOriginalName();
            }

            $background->name = $request->name;
            $background->advertiser_id = $request->advertiser_id;
            $background->text = $request->text;
            $background->external_link = $request->external_link;
            $background->start_date = $request->start_date;
            $background->end_date = $request->end_date;
            $background->status = $request->status;
            $background->save();

            \Session::flash('alert-success','Background image successfully Updated.');
            return redirect()->back();
        }

        return redirect('/admin');
    }

    public function create()
    {
        $advertisers  = Advertiser::all(['id', 'name']);
        return view('admin.background.create')->with(compact('advertisers'));
    }

    public function createPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'advertiser_id' => 'required',
            'image' => 'required',
            'text' => 'required',
            'external_link' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
        ]);
        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $file->move('uploads', $file->getClientOriginalName());
            $background = new background([
                'name' => $request->name,
                'advertiser_id' => $request->advertiser_id,
                'text' => $request->text,
                'external_link' => $request->external_link,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => $request->status,
                'image' =>'/uploads/'.$file->getClientOriginalName()
            ]);
        }
        $background->save();

        \Session::flash('alert-success','background successfully Added.');
        return redirect()->route('backgrounds');
    }
}
