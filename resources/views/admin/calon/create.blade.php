@extends('layouts_admin.home')
@section('home')

<form action="{{ route('calon.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <label for="">aksi</label><br>
    <div class="" style="display: inline-flex;">
        <div id="tambah" class="form-control btn btn-success col-md-3"
            style="display: flex;align-items: center;justify-content: center"><i class="fa fa-plus"></i></div>
        <div id="hapus" class="form-control btn btn-danger col-md-3"
            style="display: flex;align-items: center;justify-content: center;margin-left: 5px"><i
                class="fa fa-trash"></i>
        </div>
    </div>
    <div id="input">
        <div id="inputan" class="row inputan">
            <div class="form-group col-md-3">
                <label for="">Nama Calon</label>
                <input type="text" required name="nama[]" class="form-control ">
            </div>
            <div class="form-group col-md-3">
                <label for="">Asal delegasi</label>
                <input type="text" required name="nomor[]" class="form-control ">
            </div>
            <div class="form-group col-md-3">
                <label for="">Foto Calon</label>
                <input type="file" required name="foto[]" class="form-control ">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Tambah</button>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#tambah').click(function(){

          if ($('#inputan').length > 0) {
              $('#input').append('<div id="inputan" class="row inputan"><div class="form-group col-md-3"><label for="">Nama Calon</label><input type="text" required name="nama[]" class="form-control "></div><div class="form-group col-md-3"><label for="">Nomor Calon</label><input type="text" required name="nomor[]" class="form-control "></div><div class="form-group col-md-3"><label for="">Foto Calon</label><input type="file" required name="foto[]" class="form-control"></div></div>' )
          }
        })
    $('#hapus').click(function(){
        if ($('.inputan').length > 1) {
            $('#inputan').last().remove()
        }

        })
</script>
@endsection
