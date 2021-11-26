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
@section('judul', 'Chart')
<h3 style="text-align: center">Grafik Pemilihan</h3>
</p>


<div class="row">
    <div class="card chart-container">
        <canvas id="chart" style="width: 100%"></canvas>
    </div>
</div>
<br>
<br>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js">
</script>
<script>
    const ctx = document.getElementById("chart").getContext('2d');
      const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels:<?php
                    echo "[";
                    foreach ($pilih as $key => $value) {
                    echo(json_encode($value->nama_calon).',');
                    }
                    echo "]";
                    ?>,
          datasets: [{
            label: 'Last week',
            backgroundColor: 'rgba(161, 198, 247, 1)',
            borderColor: 'rgb(47, 128, 237)',
            data: <?php
            echo "[";
            foreach ($pilih as $key => $value) {
            echo(json_encode($value->total).',');
            }
            echo "]";
            ?>,
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
              }
            }]
          }
        },
      });
</script>
@endsection
