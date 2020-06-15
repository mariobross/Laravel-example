@extends('layout/main')

@section('title', 'Lavarel CRUD - Mahasiswa')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-10">
      <h1 class="mt-3">Daftar Mahasiswa</h1>

      @if (session('berhasil'))
      <div class="alert alert-success">
        {{ session('berhasil') }}
      </div>
      @endif

      <form action="/mahasiswa/search" method="GET">
        <div class="row justify-content-between">
          <div class="col-3">
            <div class="input-group">
              <a href="{{url('mahasiswa/create')}}" class="btn btn-primary">Tambah Data Mahasiswa</a>
            </div>
          </div>

          <div class="col-6 offset-1">
            <div class="input-group">
              <input type="text" class="form-control" name="search" placeholder="Cari Mahasiswa .." value="{{ old('search') }}" aria-describedby="button-addon2">
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary" id="button-addon2">Cari</button>
              </div>
            </div>
          </div>
        </div>
      </form>

      <table class="table mt-3">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">NRP</th>
            <th scope="col">Email</th>
            <th scope="col">Jurusan</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($mahasiswa as $mhs)
          <tr>
            <th scope="row">{{ ($mahasiswa ->currentpage()-1) * $mahasiswa ->perpage() + $loop->index + 1 }}</th>
            <td>{{ $mhs->nama }}</td>
            <td>{{ $mhs->nrp }}</td>
            <td>{{ $mhs->email }}</td>
            <td>{{ $mhs->jurusan }}</td>
            <td style="width: 165px;">
              <a href="{{ url('mahasiswa/'.$mhs->id.'/edit') }}" class="btn btn-success">Ubah</a>
              <form action="mahasiswa/{{ $mhs->id }}" class="d-inline" method="post">
                @method('delete')
                @csrf

                <button type="submit" class="btn btn-danger">Hapus</button>
              </form>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $mahasiswa->links() }}
    </div>

  </div>
</div>
@endsection