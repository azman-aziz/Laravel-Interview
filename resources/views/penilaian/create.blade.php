@extends('layouts.app')

@section('content');

    <div class="container mt-5 mb-5"> Tambah Data Penilaian
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('penilaian.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Masukan Nama</label>
                                <input type="text" value class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama Lengkap" name="nama">
                            
                                <!-- error message untuk title -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Masukan Email</label>
                                <input type="email" placeholder="Masukan Email" class="form-control @error('email') is-invalid @enderror" name="email">
                            
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
                                <input type="number" class="form-control @error('nilai_x') is-invalid @enderror" name="nilai_x" placeholder="Maximal Sampai 33">
                            
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
                                <input type="number" placeholder="Maximal sampai 23" class="form-control @error('nilai_y') is-invalid @enderror" name="nilai_y">
                            
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
                                <input type="number" placeholder="Maximal Sampai 18"class="form-control @error('nilai_z') is-invalid @enderror" name="nilai_z">
                            
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
                                <input type="number" class="form-control @error('nilai_w') is-invalid @enderror" name="nilai_w" placeholder="Maximal Sampai 13">
                            
                                <!-- error message untuk title -->
                                @error('nilai_w')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                  </div>
                                </div>


                            </div>
                            

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection