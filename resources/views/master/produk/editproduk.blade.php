@extends('temp')

@section('main')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Produk</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Master</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Produk</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Produk</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if (session('statusprod'))
                        <div class="card-sub">
                            {{ session('statusprod') }}
                        </div>
                        @endif
                        <form method="post" action="{{ env('APP_URL') }}/produk/aksieditproduk/{{ $produk->id }}"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-header">
                                <h4 class="card-title">Edit Produk</h4>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="defaultgambar1" value="{{ $produk->gambar_satu }}">
                                <input type="hidden" name="defaultgambar2" value="{{ $produk->gambar_dua }}">
                                <input type="hidden" name="defaultgambar3" value="{{ $produk->gambar_tiga }}">
                                <div class="row">
                                    <div class="col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="email2">Nama </label>
                                            <input type="text" class="form-control" name="nama" id="nama"
                                                placeholder="Nama " value="{{ $produk->nama }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="email2">Nomer </label>
                                            <input type="text" class="form-control" name="nomer" id="nomer"
                                                placeholder="Nomer " value="{{ $produk->nomer }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="email2">Kategori Produk </label>
                                            <select class="form-control" name="kategori" id="Kategori">
                                                <option value="{{ $produk->m_kategoriproduk_id }}" selected>
                                                    {{ $produk->m_kategoriproduks->nama }}</option>
                                                @foreach($kategoriproduk as $kp)
                                                <option value="{{ $kp->id }}">{{ $kp->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="email2">Harga </label>
                                            <input type="text" class="form-control" name="harga" id="harga"
                                                placeholder="Harga" value="{{ $produk->harga }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="email2">Stock </label>
                                            <input type="text" class="form-control" name="stock" id="stock"
                                                placeholder="Stock" value="{{ $produk->stock }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="email2">Promo </label>
                                            <input type="text" class="form-control" name="promo" id="promo"
                                                placeholder="Promo" value="{{ $produk->promo }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="email2">Deskripsi </label>
                                            <textarea class="form-control" name="deskripsi" id="deskripsi"
                                                rows="5">{{ $produk->deskripsi }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="email2">Gambar Satu </label>
                                            <input type="file" class="form-control-file" name="gambar1"
                                                id="exampleFormControlFile1">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="email2">Gambar Dua </label>
                                            <input type="file" class="form-control-file" name="gambar2"
                                                id="exampleFormControlFile1">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="email2">Gambar Tiga </label>
                                            <input type="file" class="form-control-file" name="gambar3"
                                                id="exampleFormControlFile1">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="email2">Aktifasi </label>
                                            <select class="form-control" name="aktif" id="aktif">
                                                <option value="{{ $produk->aktif }}" selected>{{ $produk->aktif }}
                                                </option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-secondary">
                                    <span class="btn-label">
                                        <i class="fa fa-save"></i>
                                    </span>
                                    Simpan
                                </button>
                                <a href="{{ env('APP_URL') }}/produk" class="btn btn-secondary">
                                    <span class="btn-label">
                                        <i class="fa fa-window-close"></i>
                                    </span>
                                    Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @stop