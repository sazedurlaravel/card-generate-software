<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
      p {
        padding: 0;
        margin:0;
        font-family: 'SolaimanLipi', sans-serif;
        font-size:12px;
      }
      .card-img-overlay {
        padding: 0rem;
      }
      .header-part {
        padding:5px 5px 0px 5px;
      }
      .bd-name {
        font-weight:bold;
      }
      .institue-name {
        font-size:18px;
        font-weight:bold;
        color:green;
      }
      .institue-address {
        font-weight:bold;
        color:green;
      }
      .hr-line {
        background-color:red;
        height:2px;
      }
      .nagorik-card-seba p {
        color:red;
        font-weight:bold;
        border:2px solid black;
        padding:2px 5px 0px 5px;
      }
      .card-pin-qr-area {
        padding:0px 5px 0px 5px;
      }
      .card-no p{
        background-color:white;
        padding:2px 2px 2px 7px;
        width:152px;
        font-weight:bold;
        letter-spacing:2px;
      }
      .pin-no p{
        background-color:white;
        padding:2px 2px 2px 7px;
        width:152px;
        font-weight:bold;
        letter-spacing:2px;
      }
      .card-issue {
        padding:0px 5px 0px 5px;
      }
      .card-issue p{
        background-color:white;
        padding:2px 2px 2px 7px;
        width:152px;
      }
    </style>
</head>
  <body>
    <div class="container mt-5">
      
          <div class="row" style="justify-content: center">
            <button class="btn btn-success" id="downloadBtn">Download</button>
          </div>
          <br>
          <br>
          @foreach ($ids as $id)
             @php
                 $data = App\Models\Card::find($id);
             @endphp
        
          <div  class="card capture" style="width: 326px; height:206px;">
            <img class="card-img" src="{{ asset('id_card_bg.png')}}" alt="Card image">
            <div class="card-img-overlay">
              <div class="header-part d-flex justify-content-between">
                <div class="bd-logo">
                  <img src="{{ asset('bd_logo.png')}}" width="45" height="43" alt="">
                </div>
                <div class="name-area text-center">
                  @php
                      $x=App\Models\Profile::find($data->profile->id);
                  @endphp
                    @if ($x->pouroshova)
                    <p class="bd-name">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</p>
                    <p class="institue-name">{{$x->pouroshova->pouroshova_name}}</p>
                    <p class="institue-address">{{$x->pouroshova->address}}</p>
                  @else 
                  <p class="bd-name">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</p>
                  <p class="institue-name">{{$x->union->district_name}}</p>
                  <p class="institue-address">{{$x->union->upazilla_name}},{{$x->union->union_name}}</p>
                  @endif
                </div>
                <div class="mujib-year">
                  <img src="{{ asset('mujib_year.png')}}" width="45" height="43" alt="">
                </div>
              </div>
              <div class="hr-line p-0 m-0"></div>
              <div class="d-flex justify-content-center my-2">
                <div></div>
                <div class="nagorik-card-seba"><p>স্মার্ট কার্ড সেবা</p></div>
                <div></div>
              </div>
              <div class="card-pin-qr-area d-flex justify-content-between">
                <div class="card-pin-no">
                  <div class="card-no mb-2">
                    <p>কার্ড নং {{$data->card_number}}</p>
                  </div>
                  <div class="pin-no">
                    <p>পিন নং {{$data->pin_number}}</p>
                  </div>
                </div>
                <div class="qr-code text-center">
                  <img src="{{ asset('qr_code.png')}}" width="35" height="35" alt="">
                  <p>সেবা পেতে QR স্ক্যান করে লগইন করুন </p>
                </div>
              </div>
              <div class="card-issue">
                <p>কার্ড ইস্যু তারিখঃ ০৫.০৩.২০২১</p>
              </div>
              
            </div>
          </div><br><br>

      @endforeach
       
  
    </div>


     <!-- jQuery library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

     <!-- Popper JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 
     <!-- Latest compiled JavaScript -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

     <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
     <script src="https://superal.github.io/canvas2image/canvas2image.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

     <script>
        document.querySelector('#downloadBtn').addEventListener('click', function() {
            html2canvas(document.querySelector('.capture'), {
                onrendered: function(canvas) {
                // document.body.appendChild(canvas);
                return Canvas2Image.saveAsPNG(canvas);
                }
            });
            });
       
     </script>
  </body>
</html>
