<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DummyAPI extends Controller
{
    public function index()
    {
        return ['name' => 'Subrata Jana', 'email' => 'lancerf235@gmail.com', 'age' => 25];
    }

    public function getApiDataFromDatabase($num = 0)
    {
        // return $num;
        return Device::find($num);
    }

    public function addDeviceFromPostAPI(Request $req)
    {
        $this->device = new Device;
        $this->device->device_name = $req->device_name;
        $this->device->employee_id = $req->employee_id;
        $res = $this->device->save();
        if ($res) {
            return ['result' => 'Data has been saved'];
        } else {
            return ['result' => 'Something went wrong!'];
        }
    }


    public function updateDevice(Request $req)
    {
        $device = Device::find($req->id);
        $device->device_name = $req->device_name;
        $device->employee_id = $req->employee_id;
        $res = $device->save();
        if ($res) {
            return ['result' => 'Data has been updated'];
        } else {
            return ['result' => 'Something went wrong!'];
        }
    }
}
