@extends('backend.layouts.master')


@section('content-wrapper')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Add User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')

 <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  Add User


                </h3>
                <a class="btn btn-success float-right" href="{{route('users.view')}}"><i class="fa fa-list mr-2"></i>View User</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              	
                <table id="example1" class="table table-bordered table-striped">
                	
				           <form action="{{route('users.store')}}" method="POST">
                    @csrf
                      <div class="form-row">
                        <div class="col-md-4 form-group">
                          <label>Role</label>
                         <select name="role" class="form-control">
                           <option value="">Select Role</option>
                           <option value="admin">Admin</option>
                           
                         </select>
                        </div>
                        <div class="col-md-4 form-group">
                          <label>Name</label>
                          <input class="form-control" type="text" name="name" placeholder="Enter User Name" >
                          @error('name')
                          <div class="alert" style="color: red">{{ $message }}</div>
                           @enderror
                        </div>
                        <div class="col-md-4 form-group">
                          <label>Email</label>
                          <input class="form-control" type="email" name="email" placeholder="Enter Email" >
                          @error('name')
                          <div class="alert" style="color: red">{{ $message }}</div>
                         @enderror
                        </div>
                      </div> 
                     
                      <div class="form-row">
                         <div class="col-md-6 form-group">
                          <button type="submit" class="btn btn-success">
                            @if(isset($editData))
                            Update
                            @else
                            Submit
                            @endif
                        </button>
                        </div>
                      </div>    
                   </form>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

@endsection