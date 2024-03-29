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
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Produk</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="listmodul" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Nomer</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Stock</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Nomer</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Stock</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($produk as $p)
                                        <tr>
                                            <td>{{ $p->nama }}</td>
                                            <td>{{ $p->nomer }}</td>
                                            <td>{{ $p->m_kategoriproduks->nama }}</td>
                                            <td>{{ $p->harga }}</td>
                                            <td>{{ $p->stock }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ env('APP_URL') }}/produk/editproduk/{{ $p->id }}"
                                                        data-toggle="tooltip" title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="{{ env('APP_URL') }}/produk/deleteproduk/{{ $p->id }}"
                                                        data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                                        data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ env('APP_URL') }}/produk/tambahproduk" class="btn btn-secondary btn-sm">
                                <span class="btn-label">
                                    <i class="fa fa-plus"></i>
                                </span>
                                Tambah Produk
                            </a>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop