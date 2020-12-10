@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel">
								<div class="panel-heading">
									<h2>Data Karyawan</h2>
                                </div>
                                <!-- Button trigger modal -->
                                <div class="col-lg-12">

                                    <button type="button" class="btn btn-primary right" data-toggle="modal" data-target="#staticBackdrop">
                                        Tambah Data Karyawan
                                    </button>

                                </div>
								<div class="panel-body">
                                    <br><br>
									<table class="table table-hover">
										<thead class="thead-light">
											<tr>
                                            <th scope="col">Nama Depan</th>
                                            <th scope="col">Nama Belakang</th>
                                            <th scope="col">Jenis Kelamin</th>
                                            <th scope="col">Bidang Pekerjaan</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Aksi</th>
											</tr>
										</thead>
										<tbody>
                                        @foreach($data_karyawan as $karyawan)
                                        <tr>
                                            <td><a href="/karyawan/{{$karyawan->id}}/profile">{{$karyawan->nama_depan}}</a></td>
                                            <td><a href="/karyawan/{{$karyawan->id}}/profile">{{$karyawan->nama_belakang}}</a></td>
                                            <td>{{$karyawan->jenis_kelamin}}</td>
                                            <td>{{$karyawan->bidang_pekerjaan}}</td>
                                            <td>{{$karyawan->alamat}}</td>
                                            <td>
                                                <a href="/karyawan/{{$karyawan->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="/karyawan/{{$karyawan->id}}/delete" class="btn btn-sm btn-danger" onclick="return confirm('Anda Yakin Untuk Menghapus Data Ini ?')">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
										</tbody>
									</table>
								</div>
							</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="/karyawan/create" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="namadepan">Nama Depan</label>
                            <input name="nama_depan" type="text" class="form-control" id="namadepan" placeholder="Nama Depan">
                        </div>
                        
                        <div class="form-group">
                            <label for="namabelakang">Nama Belakang</label>
                            <input name="nama_belakang" type="text" class="form-control" id="namabelakang" placeholder="Nama Belakang">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        
                        <div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="jeniskelamin">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="bidang">Bidang Pekerjaan</label>
                            <select name="bidang_pekerjaan" class="form-control" id="bidang">
                                <option value="SIT">SIT</option>
                                <option value="TIS">TIS</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" rows="3"></textarea>
                        </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop