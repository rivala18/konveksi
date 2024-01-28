<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public $product;
    public $employe;

    public function __Construct()
    {
        $this->product = Product::all();
        $this->employe = Employe::all();
        $this->inventory = Inventory::all();
    }

    private function _validate(Request $req){
        $req->validate([
            'color'=>'required',
            'color'=>'min:3',
            'qty'=>'required',
            'qty'=>'numeric',
            'qty'=>'min:1',
            'date'=>'required'
        ],[
            'color.required'=>'Harus di isi!!!',
            'color.min'=>'Minimal 3 kata',
            'qty.required'=>'Harus di isi!!!',
            'qty.numeric'=>'Isi dengan angka',
            'qty.min'=>'Minimal isi 1',
            'date.required'=>'Harus di isi!!!'
        ]);
    }

    public function index()
    {
        $data = Inventory::groupBy('inventory_id')->having('employe_id',3)->get();
        // $data = DB::table('inventories')->groupBy('inventory_id')->having('employe_id',3)->get();
        // dd(Employe::where('role_id',1)->get());
        return view('admin.createInventory', [
            'product'=>$this->product,
            'employe'=>Employe::where('role_id',1)->get(),
            'active'=>'active',
            'data'=>$data
        ]);
    }

    public function store(Request $req)
    {
        $id = IdGenerator::generate(['table' => 'inventories', 'field'=>'inventory_id', 'length' => 8, 'prefix' =>'YS-']);
        //output: 2000000001,2000000002,2000000003
        //output: 2100000001,2100000002,2100000003
        // $this->_validate($req);
        // $total = count($req->all());
        // $total = $total/3;

        // dd($total);
        // dd($req->all());
        // dd($req->color);
        $data = [];
        $data = [$req->color];
        // dd();
        // dd($req->employe);
        if ($req->color < 1) {
            return redirect()->route('invventory')->with('errors','Isi data terlebih dahulu');
        }
        for ($i=0; $i < count($req->color); $i++) { 
            # code...
            Inventory::create([
                'color'=>$req->color[$i],
                'qty'=>$req->qty[$i],
                'date'=>$req->date[$i],
                'product_id'=>$req->product[$i],
                // 'employe_id'=>$req->employe[$i],
                'employe_id'=>3,
                'inventory_id'=>$id,
            ]);
            Inventory::create([
                'color'=>$req->color[$i],
                'qty'=>0,
                'date'=>$req->date[$i],
                'product_id'=>$req->product[$i],
                'employe_id'=>$req->employe[$i],
                'inventory_id'=>$id,
            ]);
            Inventory::create([
                'color'=>$req->color[$i],
                'qty'=>0,
                'date'=>$req->date[$i],
                'product_id'=>$req->product[$i],
                'employe_id'=>2,
                'inventory_id'=>$id,
            ]);
        }
        return redirect()->back();
    }

    public function detail($id)
    {
        // dd($id);
        $data = Inventory::where('inventory_id',$id)->get();
        $test = Inventory::selectRaw('SUM(qty) as total')->where('employe_id',$data[0]->employe->id)->get();
        $pemotong = Inventory::where('inventory_id',$id)->where('employe_id',$data[0]->employe->id)->get();
        $penjahit = Inventory::where('inventory_id',$id)->where('employe_id',$data[1]->employe->id)->get();
        $pengepak = Inventory::where('inventory_id',$id)->where('employe_id',$data[2]->employe->id)->get();
        $totalPemotong = collect($pemotong)->pluck('qty')->sum();
        $totalPenjahit = collect($penjahit)->pluck('qty')->sum();
        $totalPengepak = collect($pengepak)->pluck('qty')->sum();
        // return $total[0];
        // dd($total[0]->total); 
        // dd($pengepak,$totalPengepak);
        // dd($data[0]->employe->id);
        return view('admin.detailInventory', [
            'penjahit'=>$penjahit,
            'pemotong'=>$pemotong,
            'pengepak'=>$pengepak,
            'totalPemotong'=> $totalPemotong,
            'totalPenjahit'=> $totalPenjahit,
            'totalPengepak'=> $totalPengepak,
        ]);
    }

    public function edit($id)
    {
        $data = Inventory::find($id);
        // dd($data->inventory_id,$data->employe->role->id);
        $inventory = Inventory::where('inventory_id',$data->inventory_id)->where('employe_id',$data->employe_id)->get();
        return response()->json($inventory, 200);
        // dd($inventory);
        // return view('admin.editInventory',[
        //     'data'=>$data,
        //     'product'=>$this->product,
        //     'employe'=>$this->employe,
        //     'inventory'=>$inventory
        // ]);
    }

    public function update(Request $req)
    {
        // $data = Inventory::find($req->id)->first();
        if ($req->color) {
            // $data = Inventory::where('employe_id', $)
            // Inventory::where('employe_id',$data-)->update([
            //     'color'=>$req->color
            // ]);
            return true;
        } else if ($req->qty) {
            Inventory::where('id', $req->id)->update([
                'qty'=>$req->qty
            ]);
            return true;
        }
        // $this->_validate($req);
        // $req->validate([
        //     'color'=>'required',
        //     'color'=>'min:3',
        //     'qty'=>'required',
        //     'qty'=>'numeric',
        //     'qty'=>'min:1'
        // ],[
        //     'color.required'=>'Harus di isi!!!',
        //     'color.min'=>'Minimal 3 kata',
        //     'qty.required'=>'Harus di isi!!!',
        //     'qty.numeric'=>'Isi dengan angka',
        //     'qty.min'=>'Minimal isi 1'
        // ]);
        // dd($req->all());
        // if ($req->employe=3) {
        //     Inventory::where('inventory_id',$req->inventory_id)->update([
        //         'color'=>$req->color,
        //         'product_id'=>$req->product_id
        //     ]);
        // }
        // $inventory = Inventory::where('inventory_id',$req->inventory_id)->where('employe_id',$req->employe_id)->get();
        // $a=0;
        // while ($a < count($req->color)) {
        //     // $a++;
        //     echo 'uhuyy';
        // }
        // }

        
        // dd($inventory);
        // for ($i=0; $i < count($req->color); $i++) { 
        // // return $inventory->inventory_id;
        //     // Inventory::where('inventory_id',$req->inventory_id)->where('employe_id',$req->employe_id)->update([
        //     //     'color'=>$req->color[$i],
        //     //     'qty'=>$req->qty[$i]
        //     // ]);
        // }

        // return redirect()->route('inventoryDetail',$req->inventory_id);
    }

    public function delete($id)
    {
        $data = Inventory::find($id);
        $data1 = Inventory::where('color',$data->color)
                    ->where('created_at',$data->created_at)
                    ->where('inventory_id',$data->inventory_id)
                    ->delete();
                    // dd($data1);
                    // return "hahay";
        return redirect()->back()->with('message','Berhasil menghapus data');

        // return redirect()->back()->with('message','Berhasil');
    }
}
