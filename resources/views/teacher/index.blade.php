@extends('layout/main')

@section('title', 'Lavarel CRUD - Dosen')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-10">
      <h1 class="mt-3">Daftar Dosen</h1>

      @if (session('berhasil'))
      <div class="alert alert-success">
        {{ session('berhasil') }}
      </div>
      @endif

      <form action="/mahasiswa/search" method="GET">
        <div class="row justify-content-between">
          <div class="col-3">
            <div class="input-group">
              <a href="{{url('dosen/create')}}" class="btn btn-primary">Tambah Data Dosen</a>
            </div>
          </div>

          <div class="col-3 offset-1">
            <div class="input-group">
              <input type="text" class="form-control" name="search" placeholder="Cari Dosen .." value="{{ old('search') }}" aria-describedby="button-addon2" autocomplete="off">
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary" id="button-addon2">Cari</button>
              </div>
            </div>
          </div>
        </div>
      </form>


      <div class="row mt-3">
        <div class="col-12">

          <ul class="list-group">
            @foreach ($teacher as $tech)
            <li class="list-group-item d-flex justify-content-between align-items-center">
              {{$tech->nama}}
              <a href="/dosen/{{$tech->id}}" class="badge badge-info">Detail</a>
            </li>
            @endforeach
          </ul>

        </div>
      </div>


      {{ $teacher->links() }}


    </div>

  </div>
</div>
@endsection