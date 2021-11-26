@extends('layouts_admin.home')
@section('home')
@section('judul', 'Tabel Pemilihan')
<div class="container">
    <div class="table-responsive">
        <form action="{{ route('hapus_pilihan') }}" method="post">
            @csrf @method('delete')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('anda yakin ingin menghapus semua data pilihan?')">Reset semua</button>
        </form>
        <table class="table tabel">
            <thead class="btn-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Asal Delegasi</th>
                    <th>Total Suara</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pilih_table as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_calon}}</td>
                    <td>{{ $item->asal_delegasi}}</td>
                    <td>{{ $item->total}}</td>
                    <td><img src="{{ asset('img/'. $item->foto ) }}" alt="" width="70px" height="100px"></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td>{{ $pilih_table->links() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
