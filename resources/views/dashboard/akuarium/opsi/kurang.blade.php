@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pengurangan Jumlah {{ $akuarium->nama_ikan }}</h1>
  </div>

  <div class="col-lg-4 mb-5">
    <form method="post" action="/dashboard/akuarium/{{ $akuarium->slug }}">
        @method('patch')
        @csrf
            <div class="mb-3">
                <label for="jumlah_ikan" class="form-label">Jumlah Ikan Sebelum Dikurangi</label>
                <input type="text" readonly class="form-control value1" value="{{ $akuarium->jumlah_ikan }}">
            </div>
        <div class="mb-3">
            <label for="jumlah_ikan" class="form-label">Masukkan Jumlah Ikan Yang Diambil</label>
            <input type="text"  class="form-control value2" id="jumlah_ikan" autofocus>
        </div>

        <div class="mb-3">
            <label for="result" class="form-label">Jumlah Ikan Saat Ini</label>
            <input type="text" readonly class="form-control" id="result" name="jumlah_ikan">
        </div>
        <button type="submit" class="btn btn-warning">Kurang</button>
    </form>
</div>
<script>
    $(document).ready(function(){
    $('input[type="text"]').keyup(function () {
    var val1 = parseInt($('.value1').val());
    var val2 = parseInt($('.value2').val());
            var sum = val1-val2;
            $("input#result").val(sum);
    });
    });
</script>
@endsection