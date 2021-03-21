@extends('layout/main')

@section('title', 'Mahasiswa')

@section('container')

    <!-- body -->
    <div class="container">
        @if (session('sukses'))
            <!-- alert pak -->
            <div class="alert alert-success" role="alert">
                {{session('sukses')}}
            </div>
        @endif
        <div class="row">

            <div class="col-9">
                <h1 class="mt-4 mb-1">Halaman Mahasiswa</h1>
            </div>

            <div class="col-2">
                <!-- Button trigger modal -->
                <button type="button" class="mt-4 mb-3 btn-sm btn-primary " data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Tambah Data
                </button>

            </div>

            <div class="col-12">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nilai</th>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($mahasiswa as $msh)
                            <tr>
                                <td>{{ $msh->nim }}</td>
                                <td>{{ $msh->nama }}</td>
                                <td>{{ $msh->nilai }}</td>
                                <td>
                                    <a class="btn-sm btn-warning" href="/mahasiswa/{{ $msh->id }}/edit" role="button">Edit</a>
                                    <a class="btn-sm btn-danger" href="/mahasiswa/{{ $msh->id }}/delete" role="button" 
                                        onclick="return confirm('Yakin untuk dihapus?')">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>


            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/mahasiswa/create') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">NIM</label>
                            <input name="nim" type="number" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text"><i>masukan nomor induk mahasiswa</i></div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input name="nama" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text"><i>masukan nama lengkap</i></div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nilai</label>
                            <input name="nilai" type="number" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text"><i>masukan nilai mahasiswa</i></div>
                        </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
