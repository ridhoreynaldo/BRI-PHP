@extends('layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Presensi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
              <li class="breadcrumb-item active">Presensi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

        @if (Auth::user()->role_id === 1)
          <div class="col-lg-6 col-6">
          {{-- <div id="liveDateTime"></div> --}}

            <!-- small box -->
            <div class="small-box bg-info" style="width: 600px; height: 200px; font-size: 24px; padding: 20px;">
              <div class="inner">
                <input type="text" value=" @if(isset($dataw)) {{ $dataw }} @endif" disabled style="border: 2px solid #ccc; border-radius: 10px; padding: 8px; width: 60%;"><br><br>
              </div>
              <div class="icon">
                <i class="ion ion-loop"></i>
              </div>
              <form action="{{route('generate')}}" method="POST">
                @csrf
                  <input type="submit" value="Generate Kode" class="btn btn-primary btn-lg btn-block">
              </form>
            </div>
          </div>
          <!-- ./col -->
          @endif

          @foreach($code as $user)
            @if ($user->code === 'C5A0B11EaCC952a8')
            {{ $user->code }}
              @php
              $variabel = 'C5A0B11EaCC952a8';
              @endphp
            @endif
          @endforeach

          
          @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2 || Auth::user()->role_id === 3)
          <!-- ./col -->
           <div class="col-lg-6 col-6">
            <!-- small box -->
            <form action="{{route('checkin')}}" method="POST">
              @csrf
              <div class="small-box bg-success" style="width: 600px; height: 475px; font-size: 24px; padding: 20px;">
                <div class="inner">
                  Kode Absen<input type="text" name="code" style="border: 2px solid #ccc; border-radius: 10px; padding: 8px; width: 60%;"><br><br>
                  Asisten<input type="text" name="id_asisten" style="border: 2px solid #ccc; border-radius: 10px; padding: 8px; width: 60%;"><br><br>
                  Kelas<input type="text" name="code" style="border: 2px solid #ccc; border-radius: 10px; padding: 8px; width: 60%;"><br><br>
                  Materi<input type="text" name="code" style="border: 2px solid #ccc; border-radius: 10px; padding: 8px; width: 60%;"><br><br>
                </div>
                <div class="icon">
                  <i class="ion ion-clipboard"></i>
                </div>
                <input type="submit" value="Check in" class="btn btn-primary btn-lg btn-block">
              </div>
            </form>
          </div>
          <!-- ./col -->
           <!-- ./col -->
           <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-danger" style="width: 600px; height: 200px; font-size: 24px; padding: 20px;">
              <div class="inner">
                <input type="text" style="border: 2px solid #ccc; border-radius: 10px; padding: 8px; width: 60%;"><br><br>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
              <a href="#" class="small-box-footer">Check out</a>
            </div>
          </div>
          <!-- ./col -->
          @endif
        </div>
        <!-- /.row -->
        
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
@endsection