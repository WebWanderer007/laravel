<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use PDO;
use Validator;

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
        $rules = array(
            'employee_id' => 'required',
        );
        $validator  = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
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

    public function deleteDevice($id = 0)
    {
        $device = Device::find($id);
        $res = $device->delete();
        if ($res) {
            return ['Result' => "Data has beend deleted successfully"];
        } else {
            return ['Result' => "Something went wrong"];
        }
    }


    public function search($keyword = '')
    {
        $res =  Device::where("device_name", 'like', '%' . $keyword . '%')->get();

        if (count($res)) {
            return $res;
        } else {
            return ['Result' => 'There\'s no reult found'];
        }
    }
}