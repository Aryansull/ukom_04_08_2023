@extends('layout.template')
@section('content')

<form action='{{ url('user/.$user->id_user') }}' method='post' class="bg-white shadow-lg p-3 w-50 mx-auto ">
  @csrf
  @method('PUT')
  <h4 class="fw-bold text-center">Form Edit User</h4>
  <hr>
  <div class="mb-3">
    <label class="form-label">Sebagai </label>
    <select class="form-select @error('id_role') is-invalid @enderror" aria-label="Default select example" name="id_role" required>
      <option value=" " disabled>-- pilih --</option>
      @foreach ($role as $item)
      <option value="{{ $item->id_role }}" {{ old('id_role', $user->id_role) == $item->id_role ? 'selected' : null }}>{{ $item->nama_role }}</option>
      @endforeach
    </select>
    @error('id_role')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label class="form-label">username</label>
    <input type="text" class="form-control @error('username') is-invalid @enderror"" name=" username" value="{{ $user->username}}">
    <input type="hidden" name="id_user" value="{{$user->id_user}}" />
    @error('username')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label class="form-label">email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" name=" email" value="{{ $user->email}}">
    @error('email')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label class="form-label">password</label>
    <input type="text" class="form-control @error('password') is-invalid @enderror" name=" password" value="{{ $user->password }}">
    @error('password')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-primary mx-2" name="submit">Simpan</button>
    <a href="/user"><button type="button" class="btn btn-danger">Kembali</button></a>
  </div>
</form>

<!-- START FORM -->
<!-- <form action='{{url('user/.$user->id_user') }}' method='post'>
  @csrf
  @method('PUT')
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href='user/index' class="btn btn-primary">back</a>
  </div>
  <div class="mb-3">
    <label class="form-label">Sebagai </label>
    <select class="form-select" aria-label="Default select example" name="id_role" required>
      @foreach ($role as $item)
      <option value="{{ $item->id_role }} ">
        {{ $item->nama_role }}
      </option>
      @endforeach
    </select>
  </div>
  </div>
  <div class="mb-3">
    <label class="form-label">username</label>
    <input type="text" class="form-control" name="username" value="{{ $user->username}}">
    <input type="hidden" name="id_user" value="{{$user->id_user}}" />
  </div>
  <div class="mb-3">
    <label class="form-label">email</label>
    <input type="email" class="form-control" name="email" value="{{ $user->email}}">
  </div>
  <div class="mb-3">
    <label class="form-label">password</label>
    <input type="text" class="form-control" name="password" value="{{ $user->password}}">
  </div>
  <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
  </div>
</form> -->
<!-- AKHIR FORM -->
@endsection