@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <h5 class="card-header">Data Pegawai</h5>

            <div class="card-body">
                <a href="{{ route('employee.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
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
                                <a href="{{ route('employee.edit', $data->id) }}"
                                    class="btn btn-primary">
                                    <i class="bx bxs-pencil"></i>
                                </a>

                                <form class="inline-block" action="{{ route('employee.destroy', $data->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                            class="btn btn-danger">
                                            <i class="bx bx-trash"></i>
                                    </button>
                                </form>
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
