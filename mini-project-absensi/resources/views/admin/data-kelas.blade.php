@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Kelas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Data Kelas</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="btn-group btn-group-sm">
                                <a class="btn btn-success" data-toggle="modal" data-target="#modalStore">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                            <p></p>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kelas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($kelass as $user)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->nama_kelas }}</td>

                                    
                                    <td class="text-center py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a class="btn btn-info" data-toggle="modal"
                                                data-target="#modal{{ $user->id }}">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </div>
                                        
                                        <div class="btn-group btn-group-sm">
                                            <form action="{{route('data-kelas.destroy', ['id' => $user->id])}}" method="post" onsubmit="return confirm('delete this data?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit" name="delete"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                    {{-- MODAL --}}
                                    <div class="modal fade" id="modal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Edit</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <form action="{{route('data-kelas.update', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="nama_kelas">Nama Kelas</label>
                                                                <input type="text" name="nama_kelas" value="{{$user->nama_kelas}}" id="nama_kelas" autocomplete="nama_kelas" class="form-control">
                                                                @error('nama_kelas')
                                                                <span class="text-red-500">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <input type="submit" value="Update" class="btn btn-success">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- MODAL --}}
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modalStore" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Store</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{route('data-kelas.store')}}" method="POST">
                @csrf
                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input type="text" name="nama_kelas" class="form-control" value="{{old('nama_kelas')}}">
                        @error('nama_kelas')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-success">
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection