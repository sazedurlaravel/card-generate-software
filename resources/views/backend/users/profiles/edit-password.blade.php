@extends('backend.layouts.master')

@section('content-wrapper')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Change Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Change Password</li>
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
                 
                  Change Password
                  
                </h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                @include('backend.partials.message')
                <table id="example1" class="table table-bordered table-striped">
                  
                   <form action="{{route('profiles.password.update')}}" method="POST">
                    @csrf

                   
                      <div class="form-row">
                        <div class="col-md-6 form-group">
                          <label>Current Password</label>
                          <input class="form-control" type="password" name="current_password" placeholder="Current Password"  >
                          @error('current_password')
                          <div class="alert" style="color: red">{{ $message }}</div>
                         @enderror
                         
                        </div>
                        <div class="col-md-6 form-group">
                          <label>New Password</label>
                          <input class="form-control" type="password" name="new_password"  placeholder="New Password">
                          @error('new_password')
                          <div class="alert" style="color: red">{{ $message }}</div>
                         @enderror
                         
                        </div>
                        
                      </div> 

                     
                      
                      <div class="form-row">
                         <div class="col-md-6 form-group">
                          <button type="submit" class="btn btn-success">
                            
                            Update
                           
                        </button>
                        </div>
                      </div>    
                   </form>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

@endsection