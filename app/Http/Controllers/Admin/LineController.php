<?php

namespace App\Http\Controllers\Admin;

use App\RequestLine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LineController extends Controller
{
    public function index()
    {
        $lines = RequestLine::paginate(15);
//        dd($lines);
        return view('admin.line.index')->with(compact('lines'));
    }

    public function view($id)
    {
        if ($id) {
            $line = RequestLine::findOrFail($id);
//            dd($request->requester);
            return view('admin.line.view')->with(compact('line'));
        }

        return redirect('/admin');
    }
        public function getEdit($id)
    {
        if($id){
            $line = RequestLine::findOrFail($id);
            //    dd($request);
            return view('admin.line.edit')->with(compact('line'));
        }

        return redirect('/admin/Request');
    }

        public function postEdit($id, Request $request)
    {
        if($id){
            $this->validate($request, [
                'line' => 'required',
                'receiver_type' => 'required',
                'receiver_sub_type' => 'required',
                'request_line_description' => 'required',
                'price_per_month' => 'required',
                'status' => 'required'
            ]);

            $line = RequestLine::findOrFail($id);
            $line->line = $request->line;
            $line->receiver_type = $request->receiver_type;
            $line->receiver_sub_type = $request->receiver_sub_type;
            $line->request_line_description = $request->request_line_description;
            $line->price_per_month = $request->price_per_month;
            $line->status = $request->status;
            $line->save();

            \Session::flash('alert-success','Line successfully Updated.');
            return redirect()->back();
        }

        return redirect('/admin');
    }

        public function create()
    {
        return view('admin.line.create');
    }

        public function createPost(Request $request)
    {
        $this->validate($request, [
            'line' => 'required',
            'receiver_type' => 'required',
            'receiver_sub_type' => 'required',
            'request_line_description' => 'required',
            'price_per_month' => 'required',
            'status' => 'required'
        ]);
        $line = new RequestLine([
            'line' => $request->line,
            'receiver_type' => $request->receiver_type,
            'receiver_sub_type' => $request->receiver_sub_type,
            'request_line_description' => $request->request_line_description,
            'price_per_month' => $request->price_per_month,
            'status' => $request->status
        ]);
        $line->save();

        \Session::flash('alert-success','Request line successfully Added.');
        return redirect()->route('lines');
    }
}
