@extends('templates.main')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Peminjaman</h3>
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
                        <a href="#">Tabel</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Data Peminjaman</h4>
                                <a href="{{ route('borrow.create') }}" class="btn btn-primary btn-sm">Tambah Peminjaman <i class="fa fa-plus fs-6"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Siswa</th>
                                            <th>kelas</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Jatuh Tempo</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Status</th>
                                            <th>Barang Yang Dipinjam</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Siswa</th>
                                            <th>kelas</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Jatuh Tempo</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Status</th>
                                            <th>Barang Yang Dipinjam</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($borrow as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->student->name }}</td>
                                                <td>{{ $item->student->classroom->name }}</td>
                                                <td>{{ $item->borrow_date }}</td>
                                                <td>{{ date('Y-m-d', strtotime($item->borrow_date . '+1 days')) }}</td>
                                                <td>{{ $item->return_date ?? 'Belum Dikembalikan' }}</td>
                                                <td>
                                                    @if ($item->status == 'Dipinjam')
                                                        <span class="badge text-bg-warning rounded">{{ $item->status }}</span>
                                                    @else
                                                        <span class="badge text-bg-success rounded">{{ $item->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="badge text-bg-primary btn rounded" data-bs-toggle="modal" data-bs-target="#detailBarang{{ $item->id }}">
                                                        Lihat
                                                    </button>
                                                </td>
                                                <td>
                                                    @if ($item->status == 'Dipinjam')
                                                        <form action="{{ route('borrow.status', $item->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="status" value="Dikembalikan">
                                                            <button class="badge text-bg-primary btn rounded">Dikembalikan</button>
                                                        </form>
                                                    @endif
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

    @foreach ($borrow as $item)
        <div class="modal fade" id="detailBarang{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Data Barang</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach ($item->borrowDetail as $see)
                            <li>{{ ucfirst(str_replace('_', ' ', $see->item->name)) }}</li>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
