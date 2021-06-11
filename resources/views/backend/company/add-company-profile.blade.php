@extends('backend.layouts.master')

@section('content-wrapper')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Company (Union)</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Company(Union)</li>
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
                Add Company(Union)
                </h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               
                  
                <table id="example1" class="table table-bordered table-striped" >

                  <form action="{{route('company.store')}}" method="POST" >
                    @csrf
                      <div class="form-row p">
                        <div class="col-md-6 form-group">
                          <label>Company Name</label>
                          <input class="form-control" type="text" name="name" placeholder="Enter Company Name" class="@error('name') is-invalid @enderror">
                            @error('name')
                                <div class="alert" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                          <label>Company Prefix</label>
                          <input class="form-control" type="text"placeholder="Enter Card Prefix" name="company_prefix" >
                          @error('company_prefix')
                          <div class="alert" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                          <label>Union Name</label>
                          <input class="form-control" type="text" name="union_name" placeholder="Enter Union Name" class="@error('union_name') is-invalid @enderror">
                            @error('union_name')
                                <div class="alert" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                          <label>District Name</label>
                          <input class="form-control" type="text" name="district_name" placeholder="Enter District Name" class="@error('district_name') is-invalid @enderror">
                            @error('district_name')
                                <div class="alert" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 form-group">
                          <label>Upazilla Name</label>
                          <input class="form-control" type="text" name="upazilla_name" placeholder="Enter Upazilla Name" class="@error('name') is-invalid @enderror">
                            @error('upazilla_name')
                                <div class="alert" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                          <label>Url</label>
                          <input class="form-control" type="text" name="url" placeholder="Enter URL" class="@error('url') is-invalid @enderror">
                            @error('url')
                                <div class="alert" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                      </div> 
                     
                      </div> 
                      <div class="form-row p" >
                        <div class="col-md-12 form-group">
                            <label>Comments</label>
                           <textarea name="comments" id="" cols="30" rows="5" class="form-control" placeholder="Enter Your Comments Here" ></textarea>
                          </div>
                    </div> 
                    <div class="form-row p">
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

@section('scripts')

<script>
  // $(document).ready(function(){
  //   $(".p").hide();
  //   $(".u").hide();
  //   $("#p").click(function(){
  //     $(".u").hide();
  //     $(".p").show();
  //   });
  //   $("#union").click(function(){
  //     $(".u").show();
  //     $(".p").hide();
  //   });
  // });
  // </script>
    
@endsection