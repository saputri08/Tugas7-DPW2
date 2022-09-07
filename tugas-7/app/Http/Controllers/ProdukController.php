<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use faker;

class ProdukController extends Controller {
    function index(){
        $user = request()->user();
        $data['list_produk'] = $user->produk;
        return view('produk.index', $data);
    } 
    function create(){
        return view('produk.create');
    }
    function store(){
        $produk = new Produk;
        $produk->id_user = request('id_user');
        $produk->nama = request('nama');
        $produk->stok = request('stok');
        $produk->harga = request('harga');
        $produk->berat = request('berat');
        $produk->deskripsi = request('deskripsi');
        $produk->save();


        return redirect('produk')->with('success','Data Berhasil Ditambahkan');

    }

    function show($produk){
        $data['produk'] = Produk::find($produk);
        return view('produk.show', $data);

    }

    function edit(produk $produk){
        $data['produk'] = $produk;
        return view('produk.edit', $data);

    }

    function update(produk $produk){
        $produk->nama = request('nama');
        $produk->harga = request('harga');
        $produk->berat = request('berat');
        $produk->stok = request('berat');
        $produk->deskripsi = request('deskripsi');
        $produk->save();

        return redirect('admin/produk')->with('success','Data Berhasil Diedit');

    }
    function destroy(produk $produk){

        $produk->delete();
        return redirect('admin/produk')->with('danger','Data Berhasil Dihapus');

    }

    function filter(){
        $nama = request('nama');
        $stok = explode(",", request('stok'));
        $data['harga_min'] = $harga_min = request('harga_min');
        $data['harga_max'] =$harga_max = request('harga_max');
        // $data['list_produk'] = Produk::where('nama','like', "%$nama%")->get();
        // $data['list_produk'] = Produk::whereIn('stok', $stok)->get();
        // $data['list_produk'] = Produk::whereBetween('harga', [$harga_min, $harga_max])->get();
        // $data['list_produk'] = Produk::where('nama','<>', "%$nama%")->get();
        // $data['list_produk'] = Produk::whereNotIn('stok', $stok)->get();
        // $data['list_produk'] = Produk::whereBetween('harga', [$harga_min, $harga_max])->get();
        // $data['list_produk'] = Produk::whereNotNull('stok')->get();
        //  $data['list_produk'] = Produk::whereDate('created_at',)->get();
          $data['list_produk'] = Produk::whereBetween('harga', [$harga_min, $harga_max])->whereYear('created_at', '2020')->get();
        $data['nama'] = $nama;
        $data['stok'] = request('stok');
        return view('produk.index', $data);   
    }
}