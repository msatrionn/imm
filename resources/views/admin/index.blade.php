@extends('layouts_admin.home')
@section('home')
{{--
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cdbootstrap@1.0.0/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cdbootstrap@1.0.0/css/cdb.min.css" />
<script src="https://cdn.jsdelivr.net/npm/cdbootstrap@1.0.0/js/cdb.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/cdbootstrap@1.0.0/js/bootstrap.min.js">
</script> --}}
<script src="https://kit.fontawesome.com/9d1d9a82d2.js" crossorigin="anonymous"></script>
<style>
    .chart-container {
        width: 90%;
        height: 100%;
        margin: auto;
    }
</style>
@section('judul', 'Dashboard')
<div class="row" style="justify-content: center;">
    <div class="card shadow"
        style="border-radius: 20px;width: 220px;height:130px;margin-right: 10px; margin-top: 20px;display: flex;justify-content: center;align-items: center">
        <h3>Calon</h3>
        <h1>{{ $calon }}</h1>
    </div>
    <div class="card shadow"
        style="border-radius: 20px;width: 220px;height:130px;margin-right: 10px; margin-top: 20px;display: flex;justify-content: center;align-items: center">
        <h3>Pemilih</h3>
        <h1>{{ $user }}</h1>
    </div>
    <div class="card shadow"
        style="border-radius: 20px;width: 220px;height:130px;margin-right: 10px; margin-top: 20px;display: flex;justify-content: center;align-items: center">
        <h3>Sudah Memilih</h3>
        <h1>{{ $sudah }}</h1>
    </div>
    <div class="card shadow"
        style="border-radius: 20px;width: 220px;height:130px;margin-right: 10px; margin-top: 20px;display: flex;justify-content: center;align-items: center">
        <h3>Belum Memilih</h3>
        <h1>{{ $belum }}</h1>
    </div>
</div>


@endsection
