<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileHandler extends Controller
{
    public function index(Request $req)
    {
        // return $req->file('file')->store('docs');
        $ext = $req->file('file')->getClientOriginalExtension();
        return $req->file('file')->storeAs('docs', 'FileName.' . $ext);
    }
}