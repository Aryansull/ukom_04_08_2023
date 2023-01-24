@extends('layout.template')
@section('content')
 <div class="card mx-auto shadow overflow-auto px-2">

<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
      <form class="d-flex" action="{{ url('user') }}" method="get">
          <input class="form-control w-75 input-sm me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search"><button type="submit" class="btn btn-sm btn-primary">Cari</button>
        </form>
        
        <div class="example-content-secondary"><button href='user/create' type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
+ Tambah User</button></div>
  </div>
</nav>


<div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
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
          <?php $no=1; ?>
 @foreach ($role as $item => $key)  <tbody>
  <tr>
  <td>{{ $role->firstItem() + $item}}</td>
    <td scope="row"> {{ $key->nama_role }} </td>
    <td scope="row"> {{ $key->username }} </td>
    <td scope="row"> {{ $key->email }} </td>
    <td scope="row"> {{ $key->password }} </td>
    <td>
                                <a href={{url('user/'.$key->id_user.'/edit')}} class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <form onsubmit="return confirm('yakin mao diapus?')" class="d-inline" action="{{url('user/'.$key->id_user)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>
                                    </form>
                            </td>
    </tbody>
    @endforeach
        </table>
        {{ $role->links() }}

      </div>



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    @include('komponen.pesan')
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah User </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action='{{ url('user') }}' method='post' class="bg-white">
@csrf
<div class="mb-3">
    <label class="form-label">Sebagai </label>
    <select class="form-select" aria-label="Default select example" name="id_role" required>
    <option disabled selected>-- Pilih Role --</option>
    @foreach ($role as $item)
    <option value="{{ $item->id_role }} ">{{ $item->nama_role }}</option>
    @endforeach
    </select>
</div>
  <div class="mb-3">
    <label class="form-label">username</label>
    <input type="text" class="form-control" name='username' value="{{ Session::get('username')}}" id="username">
  </div>
  <div class="mb-3">
    <label class="form-label">email</label>
    <input type="email" class="form-control" name='email' value="{{ Session::get('email')}}" id="email">
  </div>
  <div class="mb-3">
    <label class="form-label">password</label>
    <input type="text" class="form-control" name='password' value="{{ Session::get('password')}}" id="password">
  </div>
  <div class="mb-3 row">
                <!-- <label for="password" class="col-sm-2 col-form-label"></label> -->
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
      </form>
        <!-- AKHIR FORM -->
        
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>  
      </div>
    </div>
  </div>
</div>

@endsection