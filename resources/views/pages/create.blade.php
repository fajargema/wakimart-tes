@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <h5 class="card-header">Data Pegawai</h5>

            <div class="card-body">
                <form action="{{ route('employee.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Nama Pegawai</label>
                      <input type="text" class="form-control" name="name">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
          </div>
    </div>
@endsection
