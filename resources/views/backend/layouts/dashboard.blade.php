@extends('backend.layouts.master')

@section('content-wrapper')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
     <!-- Small boxes (Stat box) -->
     <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              @php
                  $id = Auth::user()->id;
                  $user = App\Models\Card::where('user_id',$id)->get();
              @endphp
              <h3>{{count($user)}}</h3>

              <p>Total Cards</p>
            </div>
            <div class="icon">
              <i class="ion ion-card"></i>
            </div>
            <a href="{{route('card.view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          @if (Auth::user()->role=="superadmin")
               <div class="small-box bg-success">
            <div class="inner">
              @php
                  $user = App\Models\User::where('role','admin')->get();
              @endphp
              <h3>{{count($user)}}</h3>

              <p>Total Users</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="{{route('users.view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
          @endif
         
        </div>
      
        <!-- ./col -->
      </div>
      <!-- /.row -->
@endsection