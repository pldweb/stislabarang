<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class CrudController extends Controller
{
    // Tampilkan data
    public function index(){
        Paginator::useBootstrap();
        $data_barang = DB::table('data_barang')->paginate(6);
        return view('crud',['data_barang' => $data_barang]);
    }

    // Method untuk menampilkan tambah data
    public function tambah(){
        return view('layouts/crud-tambah-data');
    }

    // Method Untuk simpan data
    public function simpan(Request $request){
        // dd($request->all());
        $request->validate([
            'kode_barang' => 'required|min:2',
            'nama_barang' => 'required|min:1',
            'nama_pengirim' => 'required',
            'deskripsi_barang' => 'required',
        ]);

        DB::table('data_barang')->insert([
            ['kode_barang' => $request->kode_barang,
             'nama_barang' => $request->nama_barang,
             'nama_pengirim' => $request->nama_pengirim,
             'deskripsi_barang' => $request->deskripsi_barang,]
        ]);

        return redirect('crud')->with('status', 'Data berhasil ditambah!');
    }



    // Method untuk edit data
    public function edit($id){
        $data_barang = DB::table('data_barang')->where('id',$id)->first();
        return view('layouts/crud-edit-data', compact('data_barang'));
    }

    // Method untuk update data
    public function update(Request $request,$id ){

        $request->validate([
            'kode_barang' => 'required|min:2',
            'nama_barang' => 'required|min:1',
            'nama_pengirim' => 'required',
            'deskripsi_barang' => 'required',
        ]);

        DB::table('data_barang')->where('id', $id)->update([

             'kode_barang' => $request->kode_barang,
             'nama_barang' => $request->nama_barang,
             'nama_pengirim' => $request->nama_pengirim,
             'deskripsi_barang' => $request->deskripsi_barang,
        ]);
        
        return redirect('crud')->with('status', 'Data berhasil diupdate!');

    }


    // Method untuk delete data
    public function delete($id){
        DB::table('data_barang')->where('id', $id)->delete();
        return redirect('crud')->with('status', 'Data berhasil dihapus!');
        
    }

}
