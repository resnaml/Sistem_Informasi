@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex pt-3 pb-2 border-dark border-bottom">
        <h1 class="h2">Halaman Pengarsipan</h1>
    </div>

    <div class="d-flex border-bottom border-dark mt-2">
        <a class="btn btn-primary mb-2 me-3" href="/pengarsipan/create"><i class="bi bi-folder-plus"></i> Buat File Arsip</a>
        
            <form method="GET" action="/pengarsipan/cari-arsip">
                @if (request('kode_arsip'))
                        <input type="hidden" name="kode_arsip" value="{{ request('kode_arsip') }}">
                    @endif
                <input type="text" class="btn mb-2 me-3 btn-outline-info" placeholder="Cari Arsip..." name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-secondary mb-2 me-3" type="submit"><i class="bi bi-search"></i> Cari...</button>
            </form>

                <button class="btn btn-success mb-2 me-3" onclick="cari()"><i class="bi bi-search"></i> Kategori</button>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success mt-1" role="alert">
        {{ session('success') }}
    </div>
    @endif

    @if(session()->has('danger'))
    <div class="alert alert-danger mt-1" role="alert">
        {{ session('danger') }}
    </div>
    @endif

    <div class="card-group_s mt-3 mb-3 row" id="tabel">
        <div class="card border border-dark" style="max-width: 13rem;">
            <div class="card-header h5 mt-2"><b>Arsip Berguna</b>  
            <div class="mt-2 h4 bold border"><a href="/pengarsipan/AB">{{ $arsipBerguna }}</a></div>
            </div>
            <div class="card-body">
                <i class="bi bi-safe" style="font-size: 4.0rem;"></i>
            </div>
        </div>
        <div class="card border border-dark" style="max-width: 13rem;">
            <div class="card-header h5 mt-2"><b>Arsip Penting</b>
                <div class="h4 border mt-2"><a href="/pengarsipan/AP">{{ $arsipPenting }}</a></div>
            </div>
            <div class="card-body">
                <i class="bi bi-safe-fill" style="font-size: 4.0rem;"></i>
            </div>
        </div>
        <div class="card border border-dark" style="max-width: 13rem;">
            <div class="card-header h5 mt-2"><b>Arsip Vital</b>
                <div class="h4 border mt-2"><a href="/pengarsipan/AV">{{ $arsipVital }}</a></div>
            </div>
            <div class="card-body">
                <i class="bi bi-safe2" style="font-size: 4.0rem;"></i>
            </div>
        </div>
        <div class="card border border-dark" style="max-width: 13rem;">
            <div class="card-header h5 mt-2"><b>Arsip Dinamis</b> 
            <div class="h4 border mt-2"><a href="/pengarsipan/AD">{{ $arsipDinamis }}</a></div>
            </div>
            <div class="card-body">
                <i class="bi bi-safe2-fill" style="font-size: 4.0rem;"></i>
            </div>
        </div>
    </div>
        
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <table class="table table-striped table-bordered">
                        <thead class="table table-primary table-striped-columns">
                            <tr>
                                <th>No</th>
                                <th>Kode Arsip</th>
                                <th>Judul Arsip</th>
                                <th>Tgl Arsip</th>
                                <th></th>
                            </tr>
                        </thead>
                        @foreach($arsip as $arsip)
                        <tbody>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $arsip->full_kode }}</td>
                                <td>{{ $arsip->judul }}</td>
                                <td>{{ $arsip->created_at->format('y-m-d') }}</td>
                                <td>
                                    <a href="{{ url('/pengarsipan/download/'.$arsip->id) }} " class="btn btn-success"><i class="bi bi-download"></i></a>
                                    
                                    <form action="/pengarsipan/{{ $arsip->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin untuk hapus data ??')"><i class="bi bi-trash"></i></i></button>
                                    </form>                                
                                </td>
                                </tr>
                            </tbody>
                            @endforeach
                </table>
            </div>
        </div>
    </div>

    <script>
        $('#tabel').hide();
        function cari(){
            $('#tabel').show();
        }
    </script>
    
    
@endsection