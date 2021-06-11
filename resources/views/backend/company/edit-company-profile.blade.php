@extends('backend.layouts.master')

@section('content-wrapper')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit company</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit company</li>
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
                Edit company
                </h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               
                <table id="example1" class="table table-bordered table-striped">
                  
                   <form action="{{route('company.update',$editData->id)}}" method="POST">
                    @csrf
                      <div class="form-row">
                        <div class="col-md-6 form-group">
                          <label>Company Name</label>
                          <input class="form-control" type="text" name="name" placeholder="Enter Name" class="@error('name') is-invalid @enderror"  value="{{$editData->name}}">
                            @error('name')
                                <div class="alert" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <div class="col-md-6 form-group">
                          <label>Company Prefix</label>
                          <input class="form-control" type="text"placeholder="Enter Card Prefix" name="company_prefix" value="{{$editData->company_prefix}}"  readonly>
                          @error('company_prefix')
                          <div class="alert" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                      </div> 
                     
                      </div> 
                      <div class="form-row">
                        <div class="col-md-12 form-group">
                            <label>Comments</label>
                           <textarea name="comments" id="" cols="30" rows="5" class="form-control" placeholder="Enter Your Comments Here" > {{$editData->comments}}</textarea>
                          </div>
                    </div> 

                    @if ($editData->union_id)
                    <div class="col-md-6 form-group">
                      <label>Union Name</label>
                      <input class="form-control" type="text" name="union_name" placeholder="Enter Name" class="@error('name') is-invalid @enderror" value="{{$editData->union->union_name}}">
                        @error('name')
                            <div class="alert" style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                      <label>District Name</label>
                      <input class="form-control" type="text" name="district_name" placeholder="Enter Name" class="@error('name') is-invalid @enderror" value="{{$editData->union->district_name}}">
                        @error('name')
                            <div class="alert" style="color: red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 form-group">
                      <label>Upazilla Name</label>
                      <input class="form-control" type="text" name="upazilla_name" placeholder="Enter Name" class="@error('name') is-invalid @enderror" value="{{$editData->union->upazilla_name}}">
                        @error('name')
                            <div class="alert" style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                      <label>Url</label>
                      <input class="form-control" type="text" name="url" placeholder="Enter Name" class="@error('name') is-invalid @enderror" value="{{$editData->union->url}}">
                        @error('name')
                            <div class="alert" style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                    @else
                    
                      <div class="col-md-6 form-group">
                        <label>Pouroshova Name</label>
                        <input class="form-control" type="text" name="pouroshova_name" placeholder="Enter Name" class="@error('name') is-invalid @enderror" value="{{$editData->pouroshova->pouroshova_name}}">
                          @error('name')
                              <div class="alert" style="color: red">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="col-md-6 form-group">
                        <label>Address</label>
                        <input class="form-control" type="text" name="address" placeholder="Enter Name" class="@error('name') is-invalid @enderror" value="{{$editData->pouroshova->address}}">
                          @error('name')
                              <div class="alert" style="color: red">{{ $message }}</div>
                          @enderror
                      </div>

                      <div class="col-md-6 form-group">
                        <label>Url</label>
                        <input class="form-control" type="text" name="url" placeholder="Enter Name" class="@error('name') is-invalid @enderror" value="{{$editData->pouroshova->address}}">
                          @error('name')
                              <div class="alert" style="color: red">{{ $message }}</div>
                          @enderror
                      </div>

                    @endif
                    
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                         <button type="submit" class="btn btn-success">
                          Submit
                       </button>
                       </div>  
                   </form>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

@endsection