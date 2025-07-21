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
                                <div class="card-title">Tambah Data Peminjaman</div>
                                <a href="{{ route('borrow.index') }}" class="btn btn-primary btn-sm">Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <form action="{{ route('borrow.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-2">
                                        <label>Siswa</label>
                                        <select name="student_id" class="form-select">
                                            <option selected disabled>- Pilih Siswa -</option>
                                            @foreach ($student as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('student_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div id="item-container" class="form-group mb-2 mt-3">
                                        <div class="d-flex justify-content-between mt-2 mb-2">
                                            <label>Barang</label>
                                            <button type="button" id="add-item" class="btn btn-primary btn-sm">Tambah</button>
                                        </div>
                                        <div class="item-row mb-2">
                                            <select name="item_id[]" class="form-select">
                                                <option selected disabled>- Pilih Barang -</option>
                                                @foreach ($product as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn btn-danger btn-sm remove-item mt-2">Hapus</button>
                                        </div>
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

<script src="{{ asset('assets/jquery/jquery.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#add-item').click(function() {
            const newRow = `
                    <div class="item-row mb-2">
                        <select name="item_id[]" class="form-select">
                            <option selected disabled>- Choose Item -</option>
                            @foreach ($product as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-danger btn-sm remove-item mt-2">Remove</button>
                    </div>
                `;
            $('#item-container').append(newRow);
        });

        // Handle remove button
        $(document).on('click', '.remove-item', function() {
            $(this).closest('.item-row').remove();
        });
    });
</script>
