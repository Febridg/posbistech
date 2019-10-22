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
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tambah Detail Modul</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if (session('statusmodul'))
                        <div class="card-sub">
                            {{ session('statusmodul') }}
                        </div>
                        @endif
                        <form action="{{ env('APP_URL') }}/modul/aksitambahdetailmodul" method="post">
                            {{ csrf_field() }}
                            <div class="card-header">
                                <h4 class="card-title">Tambah Detail Modul</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="email2">Modul</label>
                                            <select class="form-control" name="modul" id="exampleFormControlSelect1">
                                                <option value="0">-- Pilih Modul --</option>
                                                @foreach($modul as $m)
                                                @if(DetailmodulHelper::cekmodul($m->id)!=1)
                                                <option value="{{ $m->id }}">{{ $m->nama }}</option>
                                                @endif
                                                @endforeach
                                            </select>
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
                                                <tbody>
                                                    @foreach($menu as $mn)
                                                    <tr>
                                                        <td></td>
                                                        <td>{{ $mn->nama }}</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    @foreach($mn->m_submenus as $smn)
                                                    <tr>
                                                        <td><input type="checkbox" name="sm{{ $mn->id }}{{ $smn->id }}"
                                                                value=" {{ $smn->id }}"></td>
                                                        <td>--- {{ $smn->nama }}</td>
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
                                <a href="{{ env('APP_URL') }}/modul" class="btn btn-secondary">
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