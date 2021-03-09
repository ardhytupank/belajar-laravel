@extends('template')

@section('main')
    <h3>Halaman Kelas</h3>
    <hr>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#t_kelas">
  Tambah Kelas
</button>

<!-- ALERT -->
@if ($message = Session::get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong> Successfully! </strong>{{ session('status') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
 @endif
<!-- END ALERT -->

    <table class="table table-striped mt-3">
      <thead>
        <tr class="table-dark">       
          <th scope="col"></th>
          <th scope="col">Kode Kelas</th>
          <th scope="col">Nama Kelas</th>
          <th scope="col" style="text-align: right">#</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kelas as $k)
            <tr>
              <td>{{$no++}}</td>
              <td>{{ $k->kode_kelas }}</td>
              <td>{{ $k->nama_kelas }}</td>
              <td style="text-align: right">
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                  <button type="button" class="btn btn-success btn-sm" id="btn-edit-kelas"
                  data-bs-toggle="modal" 
                  data-bs-target="#e_kelas"
                  data-id_kelas="{{ $k->id }}"
                  data-kode_kelas="{{ $k->kode_kelas }}"
                  data-nama_kelas="{{ $k->nama_kelas }}">Edit</button>
                  <form onsubmit="return confirm('Yakin akan menghapus data ini ?');" action="{{ 'kelas/'. $k->id }}" method="POST">
                      @csrf
                      @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                  </form>
                </div>
              </td>
            </tr>
        @endforeach
        <tr>
        </tr>
      </tbody>
</table>

<!-- Tambah siswa -->
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

  <!-- Edit Siswa -->
  <div class="modal fade" id="e_kelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ 'kelas/edit' }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Edit Kelas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4">
                  <input class="form-control" type="text" id="edit-kode-kelas" name="kode_kelas" placeholder="Kode Kelas" aria-label="default input example" readonly>
                </div>
                <div class="col-md-8">
                  <input class="form-control" type="text" id="edit_nama_kelas" name="nama_kelas" placeholder="Nama Kelas">
                </div>
                <input type="hidden" id="edit_id_kelas" name="id_kelas">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Edit</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
  </div>

@endsection