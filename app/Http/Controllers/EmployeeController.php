<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Role;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public $role;

    public function __Construct()
    {
        $this->role = Role::all();
    }
    private function _validate(Request $req) {
        $req->validate([
            'name.required',
            'address.required',
            'role.required',
        ],[
            'name.required'=>'Harus di isi',
            'name.min'=>'Minimal 3 kata',
            'address.required'=>'Harus di isi',
            'address.min'=>'Minimal 3 kata',
            'role.required'=>'Harus di isi',
            'role.min'=>'Minimal 3 kata',
        ]);
    }

    public function create()
    {
        
        return view('admin.createEmploye',[
            'role'=>$this->role
        ]);
    }

    public function store(Request $req)
    {
        $this->_validate($req);

        Employe::create([
            'name'=>$req->name,
            'address'=>$req->address,
            'role_id'=>$req->role
        ]);

        return redirect()->route('employee.index')->with('message','Berhasil menambahkan data');
    }

    public function index()
    {
        $data = Employe::all();
        // dd($data->role());
        return view('admin.employe',[
            'data'=>$data,
            'active'=>'active'
        ]);
    }

    public function edit($id)
    {
        $data = Employe::find($id);

        return view('admin.editEmploye', [
            'data'=>$data,
            'role'=>$this->role,
            'active'=>'active'
        ]);
    }

    public function update(Request $req)
    {
        $this->_validate($req);

        Employe::where('id',$req->id)->update([
            'name'=>$req->name,
            'address'=>$req->address,
            'role_id'=>$req->role
        ]);

        return redirect()->route('employee.index')->with('message','Berhasil mengubah data');
    }
    
    public function destroy($id)
    {
        Employe::find($id)->delete();

        return redirect()->back()->with('message','Berhasil menghapus data');
    }
}
