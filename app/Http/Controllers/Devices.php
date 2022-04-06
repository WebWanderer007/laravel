<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;


class Devices extends Controller
{
    public function index(Device $key)
    {
        return $key;
    }
}