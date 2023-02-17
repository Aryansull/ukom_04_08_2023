@extends('layout.template')
@section('content')

<!-- START FORM -->
<form action='{{ url('user') }}' method='post' class="bg-white shadow-lg p-3 w-50 mx-auto ">
  @csrf
  <h4 class="fw-bold text-center">Form Tambah User</h4>
  <hr>
  <div class="mb-3">
    <label class="form-label">Sebagai </label>
    <select class="form-select @error('id_role') is-invalid @enderror" aria-label="Default select example" value="{{ old('id_role')}}" name="id_role" required>
      <option disabled selected>-- Pilih Role --</option>
      @foreach ($role as $item)
      <option value="{{ old('id_role', $item->id_role) }} ">{{ $item->nama_role }}</option>
      @endforeach
    </select>
    @error('id_role')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label class="form-label">username</label>
    <input type="text" class="form-control @error('username') is-invalid @enderror" name='username' value="{{ Session::get('username')}}" id="username">
    @error('username')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label class="form-label">email</label>
    <input type="email" class="form-control  @error('email') is-invalid @enderror" name='email' value="{{ Session::get('email')}}" id="email">
    @error('email')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label class="form-label">password</label>
    <input type="text" class="form-control  @error('password') is-invalid @enderror" name='password' value="{{ Session::get('password')}}" id="password">
    @error('password')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-primary mx-2" name="submit">Simpan</button>
    <a href="/user"><button type="button" class="btn btn-danger">Kembali</button></a>
  </div>
</form>
<!-- AKHIR FORM -->
@endsection