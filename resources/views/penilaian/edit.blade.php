@extends('layouts.app')

@section('content');

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">

                        <form action="{{ route('penilaian.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            

                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $blog->nama) }}" placeholder="Masukkan Judul Blog">
                            
                                <!-- error message untuk title -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Masukan Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $blog->email) }}">
                            
                                <!-- error message untuk title -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            
                            <div class="row">
                                <div class="col-md-3">
                                <div class="form-group">
                                <label class="font-weight-bold">Masukan Nilai X</label>
                                <input type="number" class="form-control @error('nilai_x') is-invalid @enderror" name="nilai_x" value="{{ old('nilai_x', $blog->nilai_x) }}">
                            
                                <!-- error message untuk title -->
                                @error('nilai_x')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                  </div>
                                </div>

                                <div class="col-md-3">
                                <div class="form-group">
                                <label class="font-weight-bold">Masukan Nilai Y</label>
                                <input type="number" class="form-control @error('nilai_y') is-invalid @enderror" name="nilai_y" value="{{ old('nilai_y', $blog->nilai_y) }}">
                            
                                <!-- error message untuk title -->
                                @error('nilai_y')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                  </div>
                                </div>

                                <div class="col-md-3">
                                <div class="form-group">
                                <label class="font-weight-bold">Masukan Nilai z</label>
                                <input type="number" class="form-control @error('nilai_z') is-invalid @enderror" name="nilai_z" value="{{ old('nilai_z', $blog->nilai_z) }}">
                            
                                <!-- error message untuk title -->
                                @error('nilai_z')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                  </div>
                                </div>

                                <div class="col-md-3">
                                <div class="form-group">
                                <label class="font-weight-bold">Masukan Nilai W</label>
                                <input type="number" class="form-control @error('nilai_w') is-invalid @enderror" name="nilai_w" value="{{ old('nilai_w', $blog->nilai_w) }}">
                            
                                <!-- error message untuk title -->
                                @error('nilai_w')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                  </div>
                                </div>


                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection