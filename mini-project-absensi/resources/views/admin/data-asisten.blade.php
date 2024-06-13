@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Asisten</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Data Asisten</li>
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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->role_name }}</td>

                                    
                                    <td class="text-center py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a class="btn btn-info" data-toggle="modal"
                                                data-target="#modal{{ $user->id }}">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </div>
                                        
                                        <div class="btn-group btn-group-sm">
                                            <form action="{{route('data-asisten.destroy', ['id' => $user->id])}}" method="post" onsubmit="return confirm('delete this data?');">
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
                                                        <form action="{{route('data-asisten.update', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="name">Name</label>
                                                                <input type="text" name="name" value="{{$user->name}}" id="name" autocomplete="name" class="form-control">
                                                                @error('name')
                                                                <span class="text-red-500">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="email" name="email" value="{{$user->email}}" id="email" autocomplete="email" class="form-control">
                                                                @error('email')
                                                                <span class="text-red-500">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password">Password</label>
                                                                <input type="password" name="password" value="{{$user->password}}" id="password" autocomplete="password" class="form-control">
                                                                @error('password')
                                                                <span class="text-red-500">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="role_id">Role</label>
                                                                  <select id="role_id" name="role_id" autocomplete="role_id" class="form-control">
                                                                    @foreach($roles as $role)
                                                                    <option value="{{$role->id}}" {{$role->role_name == $user->role->role_name ? 'selected' : ''}}>{{$role->role_name}}</option>
                                                                    @endforeach
                                                                  </select>
                                                            </div>
                                                            @error('role_id')
                                                            <span class="text-red-500">{{ $message }}</span>
                                                            @enderror
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

                <form action="{{route('data-asisten.store')}}" method="POST">
                @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{old('email')}}">
                        @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="{{old('password')}}">
                        @error('password')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <select id="role_id" name="role_id" class="form-control">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" {{$role->id == old('role_id') ? 'selected' : ''}}>{{$role->role_name}}</option>
                            @endforeach
                        </select>
                        @error('role_id')
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