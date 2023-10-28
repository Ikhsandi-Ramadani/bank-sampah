<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kalkulator Bank Sampah</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('partials.style')
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a class="navbar-brand ms-4" href="index.html">
                <img src="{{ asset('assets/compiled/svg/logo.svg') }}">
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card  mt-5">
                    <div class="card-body">
                        Kalkulator bank sampah adalah alat atau aplikasi yang digunakan untuk menghitung nilai atau
                        kompensasi yang diberikan kepada individu atau komunitas yang mendaur ulang sampah mereka di
                        bank sampah. Aplikasi ini biasanya memungkinkan pengguna untuk memasukkan jenis sampah yang
                        mereka daur ulang, jumlahnya, dan kemudian menghitung nilai kompensasi berdasarkan tarif atau
                        harga per kilogram dari jenis sampah tersebut. Kalkulator bank sampah membantu mendorong praktik
                        daur ulang, mengukur dampak positif terhadap lingkungan, dan memberikan insentif ekonomi kepada
                        mereka yang aktif dalam pengelolaan sampah yang berkelanjutan.
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Kalukulator</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('hitung') }}" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Jenis Sampah</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select name="jenis_id" id="jenis_id" class="form-control">
                                            @foreach ($jeniss as $jenis)
                                                <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Jumlah (Kg)</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="number" class="form-control" id="jumlah" name="jumlah"
                                            placeholder="Jumlah" min="0">
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" id="hitung"
                                            class="btn btn-primary me-1 mb-1">Hitung</button>
                                        <a href="{{ route('home') }}"
                                            class="btn btn-light-secondary me-1 mb-1">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @if ($hitung == true)
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Hasil</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Jenis Sampah (Harga/Kg)</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <p>: {{ $jenisSampah->nama }} ({{ $jenisSampah->harga }})</p>
                                </div>
                                <div class="col-md-4">
                                    <label>Jumlah (Kg)</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <p>: {{ $jumlah }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label>Total Pendapatan</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <p>: Rp. {{ $total }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @include('partials.script')

    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>

</body>

</html>
