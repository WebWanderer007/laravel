<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Employee;
use PhpParser\Node\Stmt\Return_;

class Users extends Controller
{
    public function index($name)
    {
        return User::all();
        // $this->data['name'] = $name;
        // $this->data['users'] = ['Anil', 'Peter', 'Subrata', 'Ram', "Genie", 'Aladin'];
        // return view('users', $this->data);
    }

    public function add_user(Request $req)
    {
        $req->validate([
            'name' => 'required | max:15',
            'email' => 'required',
            'password' => 'required | min:5',
        ]);
        return $req;
    }

    public function get_http_data()
    {
        $this->data['reqres'] = Http::get('https://reqres.in/api/users?page=1')['data'];
        return view('reqres-users', $this->data);
    }

    public function showUser()
    {
        // $this->data['users'] = User::all();
        $this->data['users'] = User::paginate(5);
        return view('list', $this->data);
    }

    public function addMember(Request $req)
    {
        $member = new User;
        $req->validate([
            'user' => 'required | max:15',
            'email' => 'required',
            'address' => 'required',
            'password' => 'required | min:5',
        ]);

        $member->name = $req->user;
        $member->email = $req->email;
        $member->address = $req->address;
        $member->password = $req->password;
        $member->created_at = strtotime('now');
        $member->save();

        $data =  $req->input('user');
        $req->session()->flash('user', $data);
        return redirect('add-member');
    }

    public function updateUser(Request $req)
    {
        $req->validate([
            'user' => 'required | max:15',
            'email' => 'required',
            'address' => 'required',
            'password' => 'required | min:5',
        ]);

        $data  = User::find($req->id);
        $data->name = $req->user;
        $data->email = $req->email;
        $data->address = $req->address;
        $data->password = $req->password;
        $data->save();

        return redirect('show-users')->with('success', 'Item Updated successfully!');
    }

    public function deleteUser($id = 0)
    {
        $data = User::find($id);
        $data->delete();
        return back()->with('success', 'Item deleted successfully!');
    }

    public function editUser($id = 0)
    {
        $this->data['user'] = User::find($id);
        return view('edit', $this->data);
    }

    public function dbOperations()
    {
        return DB::table('users')
            ->where('id', 4)
            ->get();
    }

    public function op()
    {
        // return DB::table('employee')
        //     ->join('company', 'company.employee_id', '=', 'employee.id', 'left')
        //     ->select('employee.*', 'company.name as company_name', 'company.id as company_id')
        //     ->get();

        // return Employee::find(1)->getCompany;
        return Employee::find(1)->getDevices;
    }
}