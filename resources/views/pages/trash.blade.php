@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <h5 class="card-header">Sampah Data Pegawai</h5>

            <div class="card-body">
                <a href="{{ route('restore-all') }}"
                    class="btn btn-primary">
                    <i class='bx bx-plus-medical'></i> Kembalikan Semua
                </a>

                <a href="{{ route('force-all') }}" target="_blank"
                    class="btn btn-danger">
                    <i class='bx bxs-file-pdf'></i> Hapus Semua
                </a>
              <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @forelse ($datas as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>
                                <a href="{{ route('restore', $data->id) }}"
                                    class="btn btn-primary">
                                    <i class="bx bx-window-open"></i> Restore
                                </a>

                                <a href="{{ route('force', $data->id) }}"
                                    class="btn btn-danger">
                                    <i class="bx bxs-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
              </div>
            </div>
          </div>
    </div>
@endsection
