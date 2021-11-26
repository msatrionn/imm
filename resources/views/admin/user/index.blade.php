@extends('layouts_admin.home')
@section('home')
@section('judul', 'Tabel User')
<div class="container">
    <div class="table-responsive">
        <div class="row">
            <div class="col-md-5">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" required>
                        </div>
                        <div class="form-group col-md-9">
                            <label for=""></label>
                            <br><br>
                            <button type="submit" class="btn btn-primary"
                                onclick="return confirm('Generate user?')">Generate
                                User</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-2">
                <form action="{{ route('hapus_user') }}" method="post">
                    @csrf @method('delete')
                    <div class="form-group">
                        <label for=""></label>
                        <br><br>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus semua user?')">Hapus
                            User</button>
                    </div>
                </form>

            </div>
            <div class="col-md-3">
                <form action="{{ route('export_user') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for=""></label>
                        <br><br>
                        <button type="submit" class="btn btn-success">export username</button>
                    </div>
                </form>
            </div>
        </div>
        <table class="table tabel">
            <thead class="btn-primary">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Pilihan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->username}}</td>
                    <td>{{ $item->pilihan}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        {{ $user->links() }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
