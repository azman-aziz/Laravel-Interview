@extends('layouts.app')

@section('content');
    <div class="container mt-5">
      
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('penilaian.create') }}" class="btn btn-md btn-success mb-3">Tambah Data</a>
                        <table class="table table-bordered text-center align-self-center">
                            <thead>
                              <tr>
                                <th rowspan="1" scope="col">Nama</th>
                                <th rowspan="1" scope="col">Email</th>
                                <th  cope="col" class="text-center" > Nilai 
                                <table class="table table-bordered">
                                    <tr>
                                        <td>  X</td>
                                        <td>  Y</td>
                                        <td>  Z</td>
                                        <td>  W</td>
                                    </tr>
                                    </table>
                                </th>
                                <th rowspan="1" scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($blogs as $blog)
                                <tr>
                                    <td class="text-center">
                                    {{ $blog->nama }}
                                    </td>
                                    <td>{{ $blog->email }}</td>
                                    <td >
                                    <table class="table ">
                                        <tr >
                                            <td class="col-md-3">{{ $blog->nilai_x }}</td>
                                            <td class="col-md-3">{{ $blog->nilai_y }}</td>
                                            <td class="col-md-3">{{ $blog->nilai_z }}</td>
                                            <td class="col-md-3">{{ $blog->nilai_w }}</td>
                                        </tr>
                                    </table>
                                    </td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus data {{$blog->nama}} ?');" action="{{ route('penilaian.destroy', $blog->id) }}" method="POST">
                                            
                                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal{{$blog->id}}">
                                            Lihat Laporan
                                            </button>

                                        
                                        
                                        <a href="{{ route('penilaian.edit', $blog->id) }}" class="btn btn-sm btn-primary">EDIT</a>

                                            

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Blog belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          <div class="d-flex justify-content-center">
                            
                            {{ $blogs->links() }}
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Button trigger modal
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

@foreach ($ket as $blog)


<!-- Modal -->
<div class="modal fade" id="exampleModal{{$blog->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Laporan Nilai <span class="text-primary">{{$blog->nama}}</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered text-center align-self-center">
                            <thead>
                              <tr>
                                <th rowspan="1" scope="col">Aspek</th>
                                <th rowspan="1" scope="col">1</th>
                                <th rowspan="1" scope="col">2</th>
                                <th rowspan="1" scope="col">3</th>
                                <th rowspan="1" scope="col">4</th>
                                <th rowspan="1" scope="col">5</th>
                                
                               
                              </tr>
                            </thead>
                            <tbody>
                              
                                <tr>
                                    <td class="text-center">
                                    Aspek Intelegensi 
                                    </td>
                                    <td>
                                    @if ($blog->intelegensi <= 10 )
                                    {{$blog->intelegensi}}
 
                                    @endif
                                    </td>
                                    <td>
                                    @if ($blog->intelegensi > 10 && $blog->intelegensi <= 20 )
                                    {{$blog->intelegensi}}
 
                                    @endif
                                    </td>
                                    <td>
                                    @if ( $blog->intelegensi > 20 && $blog->intelegensi <= 30 ) 
                                    {{$blog->intelegensi}}
                                    @endif
                                    </td>
                                    <td>
                                    @if ( $blog->intelegensi > 30 && $blog->intelegensi <= 40  ) 
                                    {{$blog->intelegensi}}
                                    @endif
                                    </td>
                                    
                                    <td>
                                    @if ($blog->intelegensi > 40 )
                                    {{$blog->intelegensi}}
                                    @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">
                                    Aspek Numerical Ability
                                    </td>
                                    <td>
                                    @if ($blog->numerical <= 10 )
                                    {{$blog->numerical}}
                                    @endif
                                    </td>
                                    <td>
                                    @if ($blog->numerical > 10 && $blog->numerical <= 20 )
                                    {{$blog->numerical}}
                                    @endif
                                    </td>
                                    <td>
                                    @if ($blog->numerical > 20 && $blog->numerical <= 30 )
                                    {{$blog->numerical}}
                                    @endif
                                    </td>
                                    <td>
                                    @if ($blog->numerical > 30 && $blog->numerical <= 40 )
                                    {{$blog->numerical}}
                                    @endif
                                    </td>
                                    <td>
                                    @if ($blog->numerical  > 40 )
                                    {{$blog->numerical}}
                                    @endif
                                    </td>
                                </tr>

                            
                            </tbody>
                          </table>  
      </div>
      
    </div>
  </div>
</div>

@endforeach
    
   @endsection