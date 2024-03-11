<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            table.static {
                position: relative;
                /* left: 3%; */
                border: 3px solid #543554;
            }
        </style>
        <title>CETAK DATA BARANG</title>
    </head>
    <body>
        <div class="form-group">
            <h3 align="center">KEMETRIAN PERTAHANAN RI</h3>
        <h3 align="center"><img src="{{asset('gambar/logo-baru-kemhan-dok-istimewa_11.png')}}" alt="" class="brand-image img-circle" style="opacity: .9" width="200px" height="200px"><br><b>DATA BARANG</b></h3>
            <table class="static" align="center" rules="all" style="width: 95%;">
            <thead>
                <tr>
                <th>NO</th>
                <th>nama barang</th>
                <th> kategori</th>
                <th> rak</th>
                <th> gudang</th>
                <th>jumlah barang</th>
                <th>harga barang</th>
                <th>total</th>
                <th>tanggal</th>
                <th>Gambar</th>

                </tr>
                    @foreach ($cetakstok_barang as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$item->nama_barang}}</td>
                        <td>{{$item->kategori->nama_kategori}}</td>
                        <td>{{$item->rak->nama_rak}}</td>
                        <td>{{$item->gudang->nama_gudang}}</td>
                        <td>{{$item->jumlah_barang}}</td>
                        <td>Rp.{{ number_format($item->harga_barang) }}</td>
                        <td>Rp.{{ number_format($item->total) }}</td>
                        <td>{{ date('d M Y', strtotime($item->tanggal)) }}</td>
                        <td><img width="150px" src="{{ url('/data_gambar/'.$item->gambar) }}"></td>
                    </tr>
                @endforeach
            </table>
        </div> 
        <script type="text/javascript">
            window.print();
        </script>
    </body>
</html>