@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome, {{ auth()->user()->name }}</h1>
  </div>
  <div class="row">
    <div class="col-lg-8 border shadow p-4 m-3">
      <h6 class="text-center">Chart Pengiriman Terbaru</h6>
      <canvas id="rsgmenang" style="width:100%;max-width:600px"></canvas>
    </div>
    <div class="col-lg-8 border shadow p-4 m-3">
      <canvas id="rrqeleh" style="width:100%;max-width:600px"></canvas>
    </div>
  </div>

  {{-- @foreach ($pengirimans as $pengiriman)
      {{ $pengiriman->tanggal_pengiriman }},
  @endforeach --}}

  <script>
    var xValues = [
  @foreach ($pengirimans as $pengiriman)
      "{{ $pengiriman->namaIkan }}",
  @endforeach
    ];
    
    new Chart("rsgmenang", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{ 
          data: [
            @foreach ($pengirimans as $pengiriman)
                {{ $pengiriman->jumlah_ikan }},
            @endforeach
          ],
          borderColor: "blue",
          fill: false
        }]
      },
      options: {
        legend: {display: false}
      }
    });
    </script> 



{{-- bulat --}}



<script>
  var xValues = ["Small Fish", "Medium Fish", "Big Fish"];
  var yValues = [{{ $small }}, {{ $medium }}, {{ $big }}];
  var barColors = [
    "#ff5e5e",
    "#735eff",
    "#99ff5e"
  ];
  
  new Chart("rrqeleh", {
    type: "pie",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      title: {
        display: true,
        text: "Jumlah Ikan Dengan Kategorinya"
      }
    }
  });
  </script>
  @endsection