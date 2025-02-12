<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>

</head>

    <body>
        <div class="form-group">
            <p align="center"><b>Laporan Data Surat Pribadi</b></p>
            <table class="static" align="center" rule="all" border="1px" style="width: 95%;">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Surat</th>
                <th scope="col">Tgl Surat Untuk</th>
                <th scope="col">Jenis Surat</th>
                <th scope="col">Sifat Surat</th>
                <th scope="col">Pembuat Surat</th>
                <th scope="col">Tujuan Surat</th>
                <th scope="col">Status Surat</th>
                <th scope="col"><i class="bi bi-clock-fill"></i>Tgl Surat Dibuat</th>
            </tr>
            @foreach ($surats as $surat)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $surat->full_number }}</td>
                <td>{{ date('d/m/Y', strtotime($surat->tgl_surat_keluar)) }}</td>
                <td>{{ $surat->jenissurat['namejenis'] }}</td>
                <td>{{ $surat->sifatsurat['namesifat'] }}</td>
                <td>{{ $surat->user->username }}</td>
                <td>{{ $surat->kepada_id['username'] }}</td>
                <td>{{ $surat->status }}</td>
                <td>{{ $surat->created_at->format('m-d-y') }}</td>
            </tr>
            @endforeach
            
            </table>
        </div>

        <script type="text/javascript">
            window.print();
        </script>
    </body>
</html>