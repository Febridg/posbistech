@extends('temp')

@section('main')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Supplier</h4>
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
                        <a href="#">Supplier</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Supplier</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if (session('statussupplier'))
                        <div class="card-sub">
                            {{ session('statussupplier') }}
                        </div>
                        @endif
                        <form method="post" action="{{ env('APP_URL') }}/supplier/aksieditsupplier/{{ $supplier->id }}"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-header">
                                <h4 class="card-title">Tambah Supplier</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="email2">Nama Supplier </label>
                                            <input type="text" class="form-control" name="nama" id="nama"
                                                placeholder="Nama " value="{{ $supplier->nama }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email2">Alamat </label>
                                            <textarea class="form-control" name="alamat" id="alamat"
                                                rows="5">{{ $supplier->alamat }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="email2">Nomer Telepon </label>
                                            <input type="text" class="form-control" name="no_tlp" id="no_tlp"
                                                placeholder="Nomer Telepon " value="{{ $supplier->no_tlp }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email2">Email </label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Email " value="{{ $supplier->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email2">Keterangan </label>
                                            <textarea class="form-control" name="keterangan" id="keterangan"
                                                rows="5">{{ $supplier->keterangan }}</textarea>
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
                                <a href="{{ env('APP_URL') }}/supplier" class="btn btn-secondary">
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