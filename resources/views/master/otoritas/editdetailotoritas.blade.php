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
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Detail Otoritas</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if (session('statusdetailotoritas'))
                        <div class="card-sub">
                            {{ session('statusdetailotoritas') }}
                        </div>
                        @endif
                        <form action="{{ env('APP_URL') }}/otoritas/aksieditdetailotoritas/{{ $otoritas->id }}"
                            method="post">
                            {{ csrf_field() }}
                            <div class="card-header">
                                <h4 class="card-title">Edit Detail Otoritas</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="email2">Otoritas</label>
                                            <input type="text" class="form-control" name="nama" id="nama"
                                                placeholder="Nama Modul" value="{{ $otoritas->nama }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="email2">Daftar Menu</label>
                                            <table class="table mt-3">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">Nama Menu</th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="namamenu">
                                                    @foreach(DetailmodulHelper::get_menu($otoritas->m_modul_id) as $mn)
                                                    <tr>
                                                        <td></td>
                                                        <td>{{ $mn->m_menus->nama }}</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    @foreach(DetailmodulHelper::get_submenu($mn->m_menu_id,$otoritas->m_modul_id)
                                                    as $smn)
                                                    <tr>
                                                        <td>
                                                            @if(OtoritiHelper::cekdetailotoriti($otoritas->id,$mn->m_menu_id,$smn->m_submenu_id)==1)
                                                            <input type="checkbox"
                                                                name="sm{{ $mn->m_menu_id }}{{ $smn->m_submenu_id }}"
                                                                value="{{ $smn->m_submenu_id }}" checked>
                                                            @else
                                                            <input type="checkbox"
                                                                name="sm{{ $mn->m_menu_id }}{{ $smn->m_submenu_id }}"
                                                                value="{{ $smn->m_submenu_id }}">
                                                            @endif
                                                        </td>
                                                        <td>--- {{ $smn->m_submenus->nama }}</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
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
                                <a href="{{ env('APP_URL') }}/otoritas" class="btn btn-secondary">
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