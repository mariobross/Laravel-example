@extends('layout/main')

@section('title', 'Lavarel CRUD - Dosen')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-10">
      <h1 class="mt-3">Detail Dosen</h1>
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{ $teacher->nama }}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{ $teacher->nik }}</h6>
          <p class="card-text">{{ $teacher->email }}</p>
          <p class="card-text">{{ $teacher->alamat }}</p>
          <a href="{{ $teacher->id }}/edit" class="btn btn-primary">Edit</a>
          <form action="{{ $teacher->id }}" class="d-inline" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
          <a href="#" class="card-link">
            Kembali</a>
        </div>
      </div>
    </div>
  </div>
</div> @endsection