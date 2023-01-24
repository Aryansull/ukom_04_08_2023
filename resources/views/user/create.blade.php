@extends('layout.template')
@section('content')

<!-- START FORM -->
<form action='{{ url('user') }}' method='post' class="bg-light">
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
                <label for="password" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
      </form>
        <!-- AKHIR FORM -->
        @endsection