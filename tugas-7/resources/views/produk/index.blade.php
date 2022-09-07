@extends('template.base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card header">
                        <h3>Filter</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/produk/filter') }}" method="post">
                            @csrf
                            <div class="from-group">
                                <label for="" class="control-label">Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{$nama ?? ""}}">
                            </div>
                            <div class="from-group">
                                <label for="" class="control-label">Stok</label>
                                <input type="text" class="form-control" name="stok" value="{{$stok ?? ""}}">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="from-group">
                                        <label for="" class="control-label">Harga min</label>
                                        <input type="text" class="form-control" name="harga_min" value="{{$garga_min ?? ""}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="from-group">
                                        <label for="" class="control-label">Harga Max</label>
                                        <input type="text" class="form-control" name="harga_max" value="{{$harga_max ?? ""}}">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-dark float-right"><i class="fa fa-search"></i> Filter </button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Data Produk
                        <a href="{{ url('admin/produk/create') }}" class="btn btn-primary float-right"><i
                                class="fa fa-plus"></i> Tambah
                            Data</a>
                    </div>
                    <div class="card-bdoy">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Aksi</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Produk</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_produk as $produk)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ url('admin/produk', $produk->id) }}" class="btn btn-primary"><i
                                                        class="fa fa-info"></i> lihat</a>
                                                <a href="{{ url('admin/produk', $produk->id) }}/edit"
                                                    class="herf btn btn-warning"> <i class="fa fa-edit"></i> edit</a>
                                                @include('template.utils.delete', [
                                                    'url' => url('admin/produk', $produk->id),
                                                ])
                                            </div>
                                        </td>
                                        <td>{{ $produk->username }}</td>
                                        <td>{{ $produk->nama }}</td>
                                        <td>{{ $produk->produk_count }}</td>
                                        <td>{{ $produk->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
