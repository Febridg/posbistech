@extends('temp')

@section('main')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Otoritas</h4>
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
                        <a href="#">Otoritas</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Otoritas</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#otoritas"
                                        role="tab" aria-controls="pills-home" aria-selected="true">Otoritas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                        href="#detail-otoritas" role="tab" aria-controls="pills-profile"
                                        aria-selected="false">Detail Otoritas</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="otoritas" role="tabpanel"
                                    aria-labelledby="modul-tab">
                                    <div class="table-responsive">
                                        <table id="listmodul" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama Otoritas</th>
                                                    <th>Modul</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Nama Otoritas</th>
                                                    <th>Modul</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach($otoriti as $o)
                                                <tr>
                                                    <td>{{ $o->nama }}</td>
                                                    <td>{{ $o->m_moduls->nama }}</td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <a href="{{ env('APP_URL') }}/otoritas/editotoritas/{{ $o->id }}"
                                                                data-toggle="tooltip" title=""
                                                                class="btn btn-link btn-primary btn-lg"
                                                                data-original-title="Edit Task">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ env('APP_URL') }}/otoritas/deleteotoritas/{{ $o->id }}"
                                                                data-toggle="tooltip" title=""
                                                                class="btn btn-link btn-danger"
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
                                    <a href="{{ env('APP_URL') }}/otoritas/tambahotoritas"
                                        class="btn btn-secondary btn-sm">
                                        <span class="btn-label">
                                            <i class="fa fa-plus"></i>
                                        </span>
                                        Tambah Otoritas
                                    </a>
                                    <br />
                                </div>
                                <div class="tab-pane fade" id="detail-otoritas" role="tabpanel"
                                    aria-labelledby="detail-module-tab">
                                    <div class="table-responsive">
                                        <table id="detailmodul" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama Otoritas</th>
                                                    <th>Menu</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Nama Otoritas</th>
                                                    <th>Menu</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach($detailotoriti as $do)
                                                <tr>
                                                    <td>{{ $do->m_otoritis->nama }}</td>
                                                    <td>
                                                        <ul>
                                                            @foreach(OtoritiHelper::get_menu($do->m_otoriti_id) as
                                                            $domn)
                                                            <li>{{ $domn->m_menus->nama }}</li>
                                                            @foreach(OtoritiHelper::get_submenu($domn->m_menu_id,$do->m_otoriti_id)
                                                            as $dosmn)
                                                            <li>--- {{ $dosmn->m_submenus->nama }}</li>
                                                            @endforeach
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <a href="{{ env('APP_URL') }}/otoritas/editdetailotoritas/{{ $do->m_otoriti_id }}"
                                                                data-toggle="tooltip" title=""
                                                                class="btn btn-link btn-primary btn-lg"
                                                                data-original-title="Edit Task">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ env('APP_URL') }}/otoritas/deletedetailotoritas/{{ $do->m_otoriti_id }}"
                                                                data-toggle="tooltip" title=""
                                                                class="btn btn-link btn-danger"
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
                                    <a href="{{ env('APP_URL') }}/otoritas/tambahdetailotoritas"
                                        class="btn btn-secondary btn-sm">
                                        <span class="btn-label">
                                            <i class="fa fa-plus"></i>
                                        </span>
                                        Tambah Detail Otoritas
                                    </a>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop