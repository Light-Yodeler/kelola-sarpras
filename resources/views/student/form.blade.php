@extends('templates.main')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Siswa</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Form</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tambah</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div class="card-title">Tambah Data Siswa</div>
                                <a href="{{ route('student.index') }}" class="btn btn-primary btn-sm">Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <form action="{{ route('student.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-2">
                                        <label for="name">Nama</label>
                                        <input type="text" name="name" id="name" class="form-control" autofocus>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="classroom">Kelas</label>
                                        <select name="classroom_id" id="classroom" class="form-select">
                                            <option selected disabled>- Pilih Kelas -</option>
                                            @foreach ($classroom as $item)
                                                <option value="{{ $item->id }}">{{ $item->name ?? 'tidak ada data kelas' }}</option>
                                            @endforeach
                                        </select>
                                        @error('classroom')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <button class="btn btn-success btn-sm mx-2">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
