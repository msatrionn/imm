@extends('layouts_admin.home')
@section('home')

<form action="{{ route('calon.update',$calon->id_calon) }}" method="post" enctype="multipart/form-data">
    @csrf @method('put')
    <div id="input">
        <div id="inputan" class="row inputan">
            <div class="form-group col-md-3">
                <label for="">Nama Calon</label>
                <input type="text" required name="nama" class="form-control" value="{{ $calon->nama_calon }}">
            </div>
            <div class="form-group col-md-3">
                <label for="">Asal Delegasi</label>
                <input type="text" required name="nomor" class="form-control " value="{{ $calon->asal_delegasi }}">
            </div>
            <div class="form-group col-md-3">
                <label for="">Foto Calon</label>
                <input type="file" name="foto" class="form-control " value="{{ $calon->foto }}">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Edit</button>
</form>
@endsection
