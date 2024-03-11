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
                border: 1px solid #543554;
            }
        </style>
        <title>CETAK BARANG KELUAR PERTANGGAL</title>
    </head>
    <body>
    <div class="form-group">
    <h3 align="center">KEMETRIAN PERTAHANAN RI</h3>
    <h3 align="center"><img src="{{asset('gambar/logo-baru-kemhan-dok-istimewa_11.png')}}" alt="" class="brand-image img-circle" style="opacity: .9" width="200px" height="200px"><br><b>CETAK BARANG KELUAR PERTANGGAL</b></h3>
    <h3 align="center">PERIODE</h3>

    <table class="static" align="center" rules="all" style="width: 95%;">
        <th<tr>
            <th>NO</th>
            <th>NAMA BARANG</th>
            <th>JUMLAH BARANG KELUAR</th>
            <th>TANGGAL KELUAR</th>
            <th>KETERANGAN</th>
            </tr> 
            </thead>
                <tbody>
                @foreach ($cetakpertanggal as $item)
                <tr>
                <td>{{ $loop->iteration }}</td> 
                <td>{{ $item->stok_barang->nama_barang }}</td>
                <td>{{ $item->jumlah_keluar }}</td>
                <td>{{ date('d M Y', strtotime($item->tgl_keluar)) }}</td>
                <td>{{ $item->keterangan }}</td>
            </tr>
        
                @endforeach
            </table>
        </div>
        <script type="text/javascript">
            window.print();
        </script>
    </body>
</html>