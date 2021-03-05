@extends('template')

@section('main')
    <h3>Halaman Kelas</h3>
    <hr>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#t_kelas">
  Tambah Kelas
</button>

<!-- Modal -->
  <div class="modal fade" id="t_kelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ '/kelas' }}" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Kelas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4">
                  <input class="form-control" type="text" name="kode_kelas" placeholder="Kode Kelas" aria-label="default input example">
                </div>
                <div class="col-md-8">
                  <input class="form-control" type="text" name="nama_kelas" placeholder="Nama Kelas" aria-label="default input example">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
  </div>

@if ($message = Session::get('status'))
 <div class="alert alert-success alert-block">
 <button type="button" class="close" data-dismiss="alert">×</button> 
 <strong>Berhasil</strong>
 </div>
 @endif

    <table class="table table-dark table-striped mt-3">
      <thead>
        <tr>       
          <th scope="col">No</th>
          <th scope="col">Kode Kelas</th>
          <th scope="col">Nama Kelas</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kelas as $k)
            <tr>
              <td>{{$no++}}</td>
              <td>{{ $k->kode_kelas }}</td>
              <td>{{ $k->nama_kelas }}</td>
            </tr>
        @endforeach
        <tr>
        </tr>
      </tbody>
</table>
@endsection