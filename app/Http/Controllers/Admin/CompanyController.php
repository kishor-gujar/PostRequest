<?php

namespace App\Http\Controllers\Admin;

use App\ReceiverCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = ReceiverCompany::paginate(15);
        return view('admin.company.index')->with(compact('companies'));
    }

    public function view($id)
    {
        if($id){
            $company = ReceiverCompany::findOrFail($id);
            return view('admin.company.view')->with(compact('company'));
        }

        return redirect('/admin');
    }

    public function getEdit($id)
    {
        if($id){
            $company = ReceiverCompany::findOrFail($id);
//            dd($company);
            return view('admin.company.edit')->with(compact('company'));
        }

        return redirect('/admin/companys');
    }

    public function postEdit($id, Request $request)
    {
        if($id){
            $this->validate($request, [
                'name' => 'required',
                'ref' => 'required',
                'status' => 'required',
            ]);
            $company = ReceiverCompany::findOrFail($id);

            $company->name = $request->name;
            $company->ref = $request->ref;
            $company->status = $request->status;
            $company->save();

            \Session::flash('alert-success','Company successfully Updated.');
            return redirect()->back();
        }

        return redirect('/admin');
    }

    public function create()
    {
        return view('admin.company.create');
    }

    public function createPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'ref' => 'required',
            'status' => 'required',
        ]);

        $company = new ReceiverCompany([
            'name' => $request->name,
            'ref' => $request->ref,
            'status' => $request->status
        ]);
        $company->save();

        \Session::flash('alert-success','Company successfully Added.');
        return redirect()->route('companies');
    }
}
