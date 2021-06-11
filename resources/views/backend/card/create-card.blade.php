@extends('backend.layouts.master')

@section('content-wrapper')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Card</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Card</li>
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
                Add Card
                </h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">

               
                <table id="example1" class="table table-bordered table-striped">
                  
                   
                      <div class="form-row">
                        <div class="col-md-6 form-group">
                          <label>Company Name</label>
                          <select name="profile_id" id="profile_id" class="form-control" onchange="companyPrefixFetch(this.value)" required>
                                <option value="">--SELECT A COMPANY--</option>
                              @foreach ($allCompany as $data)
                                  <option value="{{$data->id}}">{{$data->name}}</option>
                              @endforeach
                          </select>
                          @error('name')
                             <div class="alert" style="color: red">{{ $message }}</div>
                          @enderror
                        </div>

                        {{-- <input type="hidden" name="prefix" id="prefix"> --}}

                        <div id="prefix"></div>

                        <div class="col-md-6 form-group">
                            <label>Count</label>
                            <input class="form-control" type="text" name="count" id="count" value="1" class="@error('count') is-invalid @enderror" onkeypress="return isNumber(event)">
                              @error('count')
                                  <div class="alert" style="color: red">{{ $message }}</div>
                              @enderror
                        </div>
                      </div> 
                     
                      </div>  
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                         <button type="button" class="btn btn-success" onclick="submit()">
                          Submit
                       </button>
                       </div>  
                </table>
              </div>
              <!-- /.card-body -->
            </div>

@endsection

@section('scripts')

<script>
    function companyPrefixFetch(profile_id)
    {
        document.getElementsByName("profile_id").readOnly = true; 
        $.ajax({
               type:'GET',
               url:'/card/fetch_prefix/'+profile_id,
               dataType: 'json',
               success:function(response) {
                console.log(response);
                var tr_str = "<div>" + 
                "<input type='hidden' name='comp_prefix' id='comp_prefix' value='"+response.company_prefix+"' required>" + 
                "</div>";
                if ($('#prefix > div').length > 0) {
                    $('#prefix > div').last().remove();
                }
                $("#prefix").append(tr_str);

                // $('#prefix').html();

               }
            });
    
    }

    function submit()
    {
        var prefix = document.getElementById("comp_prefix").value;
        var profile_id = document.getElementById("profile_id").value;
        var count = document.getElementById("count").value;
        for(var i = 0; i < count; i++)
        {
            $.ajax({
                url: "/card/store",
                type: "POST",
                data:{ 
                    _token:'{{ csrf_token() }}',
                    prefix: prefix,
                    profile_id: profile_id,


                },
                cache: false,
                dataType: 'json',
                success: function(response){
                    window.location.href="{{url('/card')}}";
                }
            });
        }
        
    }

    function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
@endsection