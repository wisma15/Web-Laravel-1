@extends('layout/main')

@section('title', 'Mahasiswa')

@section('container')

    <!-- body -->
    <div class="container">
        @if (session('sukses'))
            <!-- alert pak -->
            <div class="alert alert-info" role="alert">
                {{ session('sukses') }}
            </div>
        @endif
        <div class="row">
            <div class="col-10">
                <h1 class="mt-3">Edit Data Mahasiswa</h1>
            </div>
            <form action="/mahasiswa/{{$mahasiswa->id}}/update" method="POST">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NIM</label>
                    <input name="nim" type="number" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{$mahasiswa->nim}}">
                   
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input name="nama" type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{$mahasiswa->nama}}">
                   
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nilai</label>
                    <input name="nilai" type="number" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{$mahasiswa->nilai}}">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
            </form>
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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </div>
        </div>
    </div>

@endsection
