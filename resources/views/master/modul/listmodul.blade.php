@extends('temp')

@section('main')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Modul</h4>
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
                        <a href="#">Modul</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Modul</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#modul"
                                        role="tab" aria-controls="pills-home" aria-selected="true">Modul</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#detail-module"
                                        role="tab" aria-controls="pills-profile" aria-selected="false">Detail Modul</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="modul" role="tabpanel"
                                    aria-labelledby="modul-tab">
                                    <div class="table-responsive">
                                        <table id="listmodul" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama Modul</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Nama Modul</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach($modul as $m)
                                                <tr>
                                                    <td>{{ $m->nama }}</td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <a href="{{ env('APP_URL') }}/modul/editmodul/{{ $m->id }}"
                                                                data-toggle="tooltip" title=""
                                                                class="btn btn-link btn-primary btn-lg"
                                                                data-original-title="Edit Task">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ env('APP_URL') }}/modul/deletemodul/{{ $m->id }}"
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
                                    <a href="{{ env('APP_URL') }}/modul/tambahmodul" class="btn btn-secondary btn-sm">
                                        <span class="btn-label">
                                            <i class="fa fa-plus"></i>
                                        </span>
                                        Tambah Modul
                                    </a>
                                    <br />
                                </div>
                                <div class="tab-pane fade" id="detail-module" role="tabpanel"
                                    aria-labelledby="detail-module-tab">
                                    <div class="table-responsive">
                                        <table id="detailmodul" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama Modul</th>
                                                    <th>Menu</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Nama Modul</th>
                                                    <th>Menu</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach($detailmodul as $dm)
                                                <tr>
                                                    <td>{{ $dm->m_moduls->nama }}</td>
                                                    <td>
                                                        <ul>
                                                            @foreach(DetailmodulHelper::get_menu($dm->m_modul_id) as
                                                            $dtmn)
                                                            <li>{{ $dtmn->m_menus->nama }}</li>
                                                            @foreach(DetailmodulHelper::get_submenu($dtmn->m_menu_id,$dm->m_modul_id)
                                                            as $dtsmn)
                                                            <li>--- {{ $dtsmn->m_submenus->nama }}</li>
                                                            @endforeach
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <a href="{{ env('APP_URL') }}/modul/editdetailmodul/{{ $dm->m_modul_id }}"
                                                                data-toggle="tooltip" title=""
                                                                class="btn btn-link btn-primary btn-lg"
                                                                data-original-title="Edit Task">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ env('APP_URL') }}/modul/deletedetailmodul/{{ $dm->m_modul_id }}"
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
                                    <a href="{{ env('APP_URL') }}/modul/tambahdetailmodul"
                                        class="btn btn-secondary btn-sm">
                                        <span class="btn-label">
                                            <i class="fa fa-plus"></i>
                                        </span>
                                        Tambah Detail Modul
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