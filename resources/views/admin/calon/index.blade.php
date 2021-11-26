@extends('layouts_admin.home')
@section('home')
@section('judul', 'Tabel Calon')
<div class="container">
    <div class="table-responsive">
        <a href="{{ route('calon.create') }}" class="btn btn-success">Tambah</a>
        <br><br>
        <table class="table tabel" style="width: 100%">
            <thead class="btn-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Asal Delegasi</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($calon as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_calon}}</td>
                    <td>{{ $item->asal_delegasi}}</td>
                    <td><img src="{{ asset('img/'. $item->foto ) }}" alt="" width="70px" height="100px"
                            style="object-fit: cover"></td>
                    <td>
                        <form action="{{ route('calon.destroy',$item->id_calon) }}" method="POST">
                            @csrf @method('delete')
                            <a href="{{ route('calon.edit',$item->id_calon) }} " class="btn btn-warning">Edit</a>
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('yakin ingin menghapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
