<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $productName = '';

    public function __Construct()
    {
        $productName = $this->productName;
    }

    private function _validate(Request $req)
    {
        $req->validate([
            'productName'=>'required',
            'price'=>'required',
            'productName'=>'min:3',
            'price'=>'numeric',
            'price'=>'min:4'
        ],[
            'productName.required'=>'Harus di isi',
            'price.required'=>'Harus di isi',
            'productName.min'=>'Minimal 3 kata',
            'price.min'=>'Minimal Rp.1000.00',
            'price.numeric'=>'Masukan angka',
        ]);
    }

    public function index()
    {
        $data = Product::get();
        // dd($data);
        return view('admin.product', [
            'data'=>$data
        ]);
    }

    public function create()
    {
        return view('admin.createProduct');
    }

    public function store(Request $req)
    {
        // return 'haha';
        $this->_validate($req);
        Product::create([
            'productName'=>$req->productName,
            'price'=>$req->price
        ]);
        return redirect()->route('product')->with('message','Berhasiil menambahkan data');

    }

    public function edit($id)
    {
        $data = Product::where('id',$id)->first();
        // dd($data);
        return view('admin.editProduct',['data'=>$data]);
    }

    public function update(Request $req)
    {
        $this->_validate($req);
        Product::where('id',$req->id)->update([
            'productName'=>$req->productName,
            'price'=>$req->price
        ]);
        return redirect()->route('product')->with('message', 'Berhasil mengubah data');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back()->with('message', 'Berhasil menghapus data');
    }

}
