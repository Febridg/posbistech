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
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Bank</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="listmodul" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama Bank</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Bank</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($bank as $b)
                                        <tr>
                                            <td>{{ $b->nama }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ env('APP_URL') }}/bank/editbank/{{ $b->id }}"
                                                        data-toggle="tooltip" title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="{{ env('APP_URL') }}/bank/deletebank/{{ $b->id }}"
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
                            <a href="{{ env('APP_URL') }}/bank/tambahbank" class="btn btn-secondary btn-sm">
                                <span class="btn-label">
                                    <i class="fa fa-plus"></i>
                                </span>
                                Tambah Bank
                            </a>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop