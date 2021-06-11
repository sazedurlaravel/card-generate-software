<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
  <body>
    <div class="container">
      <div class="row mt-5">
        <div class="col-md-4 offset-md-4">

          <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header">{{$data->profile->name}}</div>
            <div class="card-body">
              <h4 class="card-title">ID: {{$data->card_number}}</h4>
              <p class="card-text">PIN: {{$data->pin_number}}</p>
            </div>
          </div>
         
        
        </div>
      </div>
    </div>

  </body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    window.print();
  });
  // setTimeout(function () {
  //   $(document).ready(function(){
  //     window.print();
  //   });
  // }, 3000);
</script>