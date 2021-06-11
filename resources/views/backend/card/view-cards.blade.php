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
            <h1 class="m-0 text-dark">View Cards</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">View Cards</li>
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
         
          <h3 class="card-title">Cards Table</h3>
         
          <a href="{{route('card.create')}}" class="btn btn-success btn-sm float-right"> <i class="fa fa-user"></i> Create Card</a>
         
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success" style=" padding-top: 21px;margin:12px;">
        <p>{{ $message }}</p>
        </div>
        @endif
        <!-- /.card-header -->
        <div class="card-body">
          <form method="GET" action="{{route('card.all')}}">
            @csrf
            <br>
            {{-- <input class="btn btn-success" type="submit" name="submit" target="_blank" value="Download All Cards"/> --}}
            {{-- <button class="btn btn-success" type="submit" >Download All Cards</button>
            <br> --}}
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              {{-- <th> <input type="checkbox" id="checkAll"> Select All</th></th> --}}
              <th>ID</th>
              <th>Card Number</th>
              <th>Pin Number</th>
              <th>Company</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
             @foreach ($data as $item)
                {{-- @php
                    $i =1;
                @endphp --}}
                  <tr>
                    {{-- <td>
                      <input name='id[]' type="checkbox" id="checkItem" 
                         value="{{$item->id}}">
                    </td> --}}
                    
                    <td>{{$loop->index+1}}</td>
                    <td>{{$item->card_number}}</td>
                    <td>{{$item->pin_number}}</td>
                    <td> {{$item->profile->name}} </td>
                    <td>
                      <a target="_blank" class="btn btn-success btn-sm" href="{{route('card.single_view',$item->id)}}">View</a>
                      {{-- <a target="_blank" class="btn btn-primary btn-sm" href="{{route('card.print',$item->id)}}">Print</a>
                       --}}
                    </td>
                    </tr>  
                    {{-- @php
                        $i++;
                    @endphp --}}
             @endforeach
                  
             
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Card Number</th>
                <th>Pin Number</th>
                <th>Company</th>
                <th>Action</th>
            </tr>
            </tfoot>
          </table>
          <br>
        </form>
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

<script language="javascript">
  $("#checkAll").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
  });
</script>
@endsection