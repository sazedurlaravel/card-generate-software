@extends('backend.layouts.master')

@section('styles')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

@endsection

@section('content-wrapper')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
         
          <h3 class="card-title">Users Table</h3>
         
          <a href="{{route('users.add')}}" class="btn btn-success btn-sm float-right"> <i class="fa fa-user"></i> Create User</a>
         
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success" style=" padding-top: 21px;margin:12px;">
        <p>{{ $message }}</p>
        </div>
        @endif
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Code</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($allData as $data)
                   <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$data->name}} </td>
                    <td>{{$data->email}}</td>
                    <td> 
                      {{$data->role}}
                    </td>
                    <td> 
                      {{$data->code}}
                    </td>
                    <td>
                      <a class="btn btn-success btn-sm" href="{{route('users.edit',$data->id)}}">Edit</a>
                      
                      <a class="btn btn-danger btn-sm" href="{{route('users.delete',$data->id)}}">Delete</a>
                    </td>
                    </tr>  
              @endforeach
                   
              
           
           
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
     
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
@endsection

@section('scripts')

    <!-- DataTables -->
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>



<script>
    $(function () {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection