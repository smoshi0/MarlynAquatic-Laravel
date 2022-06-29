<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <link href="{{ asset('css/4.3.1/bootstrap.min.css') }}" rel="stylesheet">
    <title>Marlyn Aquatic | Document</title>
</head>
<body>
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
    <div class="row d-flex justify-content-center text-center">
      <div class="col-lg-4">
      <img src="img/logo.jpeg" alt="" style="width: 150px">
    </div>
    <div class="col-lg-8">
      <h5 class="">Laporan Akuarium Marlyn Aquatic</h5>
    </div>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama Ikan</th>
              <th scope="col">Kode Akuarium</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Harga</th>
              <th scope="col">Kategori</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($akuariums as $akuarium)
            <tr>
                {{-- <td>{{ $loop->iteration }}</td> --}}
                <td>{{ $loop->iteration }}</td>
                <td>{{ $akuarium->nama_ikan }}</td>
                <td>{{ $akuarium->kode_akuarium }}</td>
                <td>{{ $akuarium->jumlah_ikan }}</td>
                <td>
                    {{ $akuarium->harga_ikan }}
                </td>
                <td>{{ $akuarium->kategori->nama_kategori }}</td>
              </tr>
              @endforeach
        </tbody>
    </table>
    <p class="text-center mt-3">Dicetak Pada Tanggal {{ $tanggal->day }}/{{ $tanggal->month }}/{{ $tanggal->year }}</p>
</body>
</html>