@extends('layout.template')
@section('content')

<!-- START FORM -->
<form action='store' method='POST' class="bg-white shadow-lg p-3 w-50 mx-auto ">
    @csrf
    <h4 class="fw-bold text-center">Form Tambah kaprog</h4>
    <hr>
    <div class="mb-3">
        <label class="form-label">username </label>
        <select class="form-select @error('id_user') is-invalid @enderror" aria-label="Default select example" name="id_user" required>
            <option disabled selected>-- Pilih user --</option>
            @foreach ($user as $item)
            <option value="{{ old('id_user', $item->id_user) }} ">{{ $item->id_user }} - {{ $item->username }}</option>
            @endforeach
        </select>
        @error('id_user')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">nama_kaprog</label>
        <input type="text" class="form-control @error('nama_kaprog') is-invalid @enderror" name='nama_kaprog' value="{{ old('nama_kaprog') }}" id="nama_kaprog">
        @error('nama_kaprog')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">foto</label>
        <input type="file" class="form-control  @error('foto') is-invalid @enderror" name='foto' value="{{ old('foto') }}" id="foto">
        @error('foto')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="d-flex justify-content-end">
        <a href="kaprog"><button type="submit" class="btn btn-primary mx-2" name="submit">Simpan</button></a>
        <a href="/kaprog"><button type="button" class="btn btn-danger">Kembali</button></a>
    </div>
</form>
<!-- AKHIR FORM -->
@endsection