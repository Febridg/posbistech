@extends('temp')

@section('main')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Bank</h4>
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
                        <a href="#">Bank</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tambah Bank</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if (session('statusbank'))
                        <div class="card-sub">
                            {{ session('statusbank') }}
                        </div>
                        @endif
                        <form method="post" action="{{ env('APP_URL') }}/bank/aksitambahbank"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-header">
                                <h4 class="card-title">Tambah Bank</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="email2">Nama Bank </label>
                                            <input type="text" class="form-control" name="nama" id="nama"
                                                placeholder="Nama ">
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
                                <a href="{{ env('APP_URL') }}/bank" class="btn btn-secondary">
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