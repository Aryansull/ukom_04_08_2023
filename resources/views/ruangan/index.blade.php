@extends('layout.template')
@section('content')

<div class="card mx-auto overflow-auto px-2 shadow-sm">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <div class=" border-bottom">
        <h5 class="fw-bold text-center pt-2">List Ruangan</h5>
    </div>

    <nav class="navbar bg-body-tertiary ">
        <div class="container-fluid p-0 mb-1">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createRuangan">
                Tambah Ruangan
            </button>
    </nav>
    @include('ruangan.create')
    <div class="table-responsive">
        <table class="table">
            <thead class="table-light">
                <tr style="text-align:center">
                    <th class="col-md-1">No</th>
                    <th class="col-md-3">id_ruangan</th>
                    <th class="col-md-4">Nama_ruangan</th>
                    <th class="col-md-2">foto_ruangan</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
            <tbody>
                @forelse ($data as $item => $key)
                <tr style="text-align:center">
                    <td>{{ $data->firstItem() + $item}}</td>
                    <td>{{$key->id_ruangan}}</td>
                    <td>{{$key->nama_ruangan}}</td>
                    <td>
                        <a href="{{ asset('storage/'.$key->foto_ruangan) }}" target="_blank" class="group">
                            <img src="{{ asset('storage/'.$key->foto_ruangan) }}" alt="" style="width: 80px; height: 80px;">
                        </a>
                    </td>
                    <td>
                        <a href={{url('ruangan/'.$key->id_ruangan.'/edit')}} class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('yakin mao diapus?')" class="d-inline" action="{{url('ruangan/'.$key->id_ruangan)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                        </form>
                    </td>
                    @empty
                    <td colspan="6">
                        <h5 class="text-center  bi bi-database-fill-x fw-bold"> Tidak Ada Data</h5>
                    </td>
                    @endforelse
            </tbody>
        </table>
    </div>
    <div>
        {{ $data->links() }}
    </div>
</div>
@endsection