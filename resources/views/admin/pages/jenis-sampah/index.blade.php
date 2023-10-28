@extends('layout.admin')

@section('title', 'Jenis Sampah')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable-jquery.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
    <div class="page-heading">

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">
                            Jenis Sampah
                        </h5>
                        <a href="{{ route('jenis-sampah.create') }}" class="btn icon icon-left btn-primary">
                            <i class="fa-solid fa-plus"></i> Tambah Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sampah as $data)
                                    <tr>
                                        <td><img src="{{ asset('Image/' . $data->foto) }}" alt="" width="150"
                                                height="150"></td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->harga }}</td>
                                        <td>
                                            <a href="{{ route('jenis-sampah.edit', $data->id) }}"
                                                class="btn icon icon-left btn-warning">
                                                <i class="fa-regular fa-pen-to-square"></i> Edit Data</a>
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#hapus-{{ $data->id }}"
                                                class="btn icon icon-left btn-danger">
                                                <i class="fa-solid fa-trash"></i> Hapus Data</button>
                                        </td>
                                    </tr>

                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="hapus-{{ $data->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Jenis Sampah</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>
                                                <form action="{{ route('jenis-sampah.destroy', $data->id) }}"
                                                    method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="hidden" name="id" id="id"
                                                        value="{{ $data->id }}">
                                                    <div class="modal-body">
                                                        Anda yakin ingin menghapus Jenis Sampah <b>{{ $data->nama }}</b>
                                                        ini ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Tutup</span>
                                                        </button>
                                                        <button type="submit" class="btn btn-outline-danger ml-1"
                                                            id="btn-save">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Yakin</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->

    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>

    <script>
        let jquery_datatable = $("#table1").DataTable({
            responsive: true
        })
    </script>
@endpush
