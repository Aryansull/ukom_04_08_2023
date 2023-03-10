@extends('layout.template')
@section('content')

<div class="card mx-auto overflow-auto px-2 shadow-sm">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <div class=" border-bottom">
    <h5 class="fw-bold text-center pt-2">List User</h5>
  </div>

  <nav class="navbar bg-body-tertiary ">
    <div class="container-fluid p-0 mb-1">
      <form class="d-flex" action="{{url('user')}}" method="GET">
        @csrf
        <input class="form-control w-75 input-sm me-1" type="search" name="katakunci" placeholder="Masukkan kata kunci" value="{{ Request::get('katakunci') }}" aria-label="Search">
        <button type="submit" class="btn btn-sm btn-primary">Cari</button>
      </form>
      <div class="p-0">
        <a href='user/create' class="btn btn-primary btn-sm">+ Tambah user</a>
      </div>
  </nav>


  <div class="table-responsive">
    <table class="table">
      <thead class="table-light">
        <tr>
          <th>No.</th>
          <th scope="col">Role</th>
          <th scope="col">Username</th>
          <th scope="col">Email </th>
          <th scope="col">Password </th>
          <th scope="col">Aksi </th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
      <tbody>
        @forelse ($role as $item => $key)
        <tr>
          <td>{{ $role->firstItem() + $item}}</td>
          <td scope="row"> {{ $key->nama_role }} </td>
          <td scope="row"> {{ $key->username }} </td>
          <td scope="row"> {{ $key->email }} </td>
          <td scope="row"> {{ $key->password }} </td>
          <td>
            <div class="d-grid gap-2 d-md-block">
              <a href={{url('user/'.$key->id_user.'/edit')}} class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
              <form onsubmit="return confirm('yakin mao diapus?')" class="d-inline" action="{{url('user/'.$key->id_user)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>
              </form>
            </div>
          </td>
          @empty
          <td colspan="6">
            <h5 class="text-center fw-bold"><i class="bi bi-database-fill-x"></i> Tidak Ada Data</h5>
          </td>
          @endforelse
      </tbody>
    </table>
  </div>
  <div>
    {{ $role->links() }}
  </div>
</div>

@endsection