@extends('layout.template')
@section('content')

<!-- START FORM -->
<form action='{{url('user/.$user->id_user') }}' method='post'>
@csrf
@method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='user/index' class="btn btn-primary">back</a>
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
    <input type="hidden"  name="id_user" value="{{$user->id_user}}" />
  </div>
  <div class="mb-3">
    <label class="form-label">email</label>
    <input type="email" class="form-control" name="email"  value="{{ $user->email}}">
  </div>
  <div class="mb-3">
    <label class="form-label">password</label>
    <input type="text" class="form-control" name="password"  value="{{ $user->password}}">
  </div>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
          </form>
        <!-- AKHIR FORM -->
        @endsection