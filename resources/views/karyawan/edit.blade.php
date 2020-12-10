@extends('layouts.master')

@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Inputs</h3>
							</div>
								<div class="panel-body">
                                <form action="/karyawan/{{$karyawan->id}}/update" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="namadepan">Nama Depan</label>
                                        <input name="nama_depan" type="text" class="form-control" id="namadepan" placeholder="Nama Depan" value="{{$karyawan->nama_depan}}">
                                    </div>
                                                
                                    <div class="form-group">
                                        <label for="namabelakang">Nama Belakang</label>
                                        <input name="nama_belakang" type="text" class="form-control" id="namabelakang" placeholder="Nama Belakang" value="{{$karyawan->nama_belakang}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="jeniskelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control" id="jeniskelamin">
                                            <option value="L" @if($karyawan->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                            <option value="P" @if($karyawan->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="bidang">Bidang Pekerjaan</label>
                                        <select name="bidang_pekerjaan" class="form-control" id="bidang">
                                            <option value="SIT" @if($karyawan->bidang_pekerjaan == 'SIT') selected @endif>SIT</option>
                                            <option value="TIS" @if($karyawan->bidang_pekerjaan == 'TIS') selected @endif>TIS</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" class="form-control" id="alamat" rows="3">{{$karyawan->alamat}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="avatar">Avatar</label>
                                        <input type="file" name="avatar" class="form-control" id="avatar">
                                    </div>

                                    <button type="submit" class="btn btn-warning">Update</button>
                                </form>
								</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
</div>
@stop
@section('content1')


    <div class="container">
        <h1>Edit Data Karyawan</h1>
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <form action="/karyawan/{{$karyawan->id}}/update" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="namadepan">Nama Depan</label>
                        <input name="nama_depan" type="text" class="form-control" id="namadepan" placeholder="Nama Depan" value="{{$karyawan->nama_depan}}">
                    </div>
                                
                    <div class="form-group">
                        <label for="namabelakang">Nama Belakang</label>
                        <input name="nama_belakang" type="text" class="form-control" id="namabelakang" placeholder="Nama Belakang" value="{{$karyawan->nama_belakang}}">
                    </div>

                    <div class="form-group">
                        <label for="jeniskelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" id="jeniskelamin">
                            <option value="L" @if($karyawan->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                            <option value="P" @if($karyawan->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="bidang">Bidang Pekerjaan</label>
                        <select name="bidang_pekerjaan" class="form-control" id="bidang">
                            <option value="SIT" @if($karyawan->bidang_pekerjaan == 'SIT') selected @endif>SIT</option>
                            <option value="TIS" @if($karyawan->bidang_pekerjaan == 'TIS') selected @endif>TIS</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" rows="3">{{$karyawan->alamat}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection
