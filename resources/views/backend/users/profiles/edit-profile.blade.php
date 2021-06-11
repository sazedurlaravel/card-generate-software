@extends('backend.layouts.master')

@section('content-wrapper')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Profile</li>
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
                  @if(isset($editData))
                  Edit Profile
                  @else
                  Add Profile
                  @endif


                </h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                
                <table id="example1" class="table table-bordered table-striped">
                  
                   <form action="{{route('profiles.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-row">
                        <div class="col-md-4 form-group">
                          <label>Name</label>
                          <input class="form-control" type="text" name="name" placeholder="Enter User Name" value="{{$editData->name}}">
                        </div>
                        <div class="col-md-4 form-group">
                          <label>Email</label>
                          <input class="form-control" type="email" name="email" placeholder="Enter Email" value="{{$editData->email}}">
                        </div>
                        <div class="col-md-4 form-group">
                          <label>Mobile</label>
                          <input class="form-control" type="text"placeholder="Enter Mobile Number" name="mobile" value="{{$editData->mobile}}">
                        </div>
                      </div> 

                      <div class="form-row">
                        <div class="col-md-3 form-group">
                          <label>Address</label>
                          <input class="form-control" type="text" name="address" placeholder="Enter Address" value="{{$editData->address}}">
                        </div>
                        <div class="col-md-3 form-group">
                          <label>Gender</label>
                         <select class="form-control" name="gender">
                           <option value="">Select Gender</option>
                           <option value="male" {{($editData->gender=="male")?'selected':""}}>Male</option>
                           <option value="female" {{($editData->gender=="female")?'selected':""}}>Female</option>
                         </select>
                        </div>
                        
                         <div class="col-md-3 form-group">
                          <label>Date of Birth</label>
                          <input class="form-control" type="date" name="dob"  value="{{$editData->dob}}">
                        </div>
                       
                      </div> 
                       <div class="form-row">
                         <div class="col-md-4 form-group">
                          <label>Religion</label>
                          <input class="form-control" type="text" name="religion" placeholder="Enter Religion Name" value="{{$editData->religion}}">
                        </div>
                        <div class="col-md-4 form-group">
                         <label>Image<font style="color:red;">*</font></label>
                        <input name="image" class="form-control" id="image" type="file"  >
                       
                        </div>
                        <div class="col-md-4 form-group">
                          <img src="{{(!empty($editData->image))? asset('backend/img/users/'.$editData->image):asset('no_img.png')}}" id="showimg" style="width: 100px;height: 100px;margin-left: 72px;">
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