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
        dd($lines);
        return view('admin.line.index')->with(compact('lines'));
    }
}
