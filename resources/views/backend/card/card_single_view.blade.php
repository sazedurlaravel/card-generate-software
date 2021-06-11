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
      color:#090808;
    }
    .card-img-overlay {
      padding: 0rem;
    }
    .header-part {
      padding:10px 10px 0px 10px;
    }
    .bd-name {
      font-weight:bold;
    }
    .bd-name p {
      color:#070606;
    }
    .institue-name {
      font-size:18px;
      font-weight:bold;
      color:#00582f;
    }
    .institue-address {
      font-weight:bold;
      color:#008245;
    }
    .hr-line {
      background-color:#df0023;
      height:2px;
    }
    .nagorik-card-seba p {
      color:#df0023;
      font-weight:bold;
      border:2px solid #080707;
      padding:2px 5px 0px 5px;
    }
    /* .card-pin-area {
      padding:0px 5px 0px 5px;
    } */
    .card-no p{
      background-color:white;
      padding:2px 2px 2px 7px;
      width:146px;
      font-weight:bold;
      /* letter-spacing:2px; */
    }
    .card-no p span{
      letter-spacing:3px;
    }
    .pin-no p{
      background-color:white;
      padding:2px 2px 2px 7px;
      width:106px;
      font-weight:bold;
      /* letter-spacing:2px; */
    }
    .pin-no p span{
      letter-spacing:3px;
    }
    /* .card-issue {
      padding:0px 5px 0px 5px;
    }
    .card-issue p{
      background-color:white;
      padding:2px 2px 2px 7px;
      width:152px;
    } */
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <div id="capture" class="card" style="width: 326px; height:206px;">
          <img class="card-img" src="{{ asset('id_card_bg.png')}}" alt="Card image">
          <div class="card-img-overlay">
            <!--card header begin-->
            <div class="header-part d-flex justify-content-between">
              <div class="bd-logo">
                <img src="{{ asset('bd_logo.png')}}" width="50" height="48" alt="">
              </div>
              <div class="name-area">
                @php
                    $x=App\Models\Profile::find($data->profile->id);
                @endphp
              @if ($x->pouroshova)
              <div class="d-flex justify-content-center">
                <p class="bd-name">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</p>
              </div>
              <div class="d-flex justify-content-center">
                <p class="institue-name">{{$x->pouroshova->pouroshova_name}}</p>
              </div>
              <div class="d-flex justify-content-center">
                <p class="institue-address">{{$x->pouroshova->address}}</p>
              </div>
              @else
              <div class="d-flex justify-content-center">
                <p class="bd-name">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</p>
              </div>
              <div class="d-flex justify-content-center">
                <p class="institue-name">{{$x->union->union_name}}</p>
              </div>
              <div class="d-flex justify-content-center">
                <p class="institue-address">{{$x->union->upazilla_name}},{{$x->union->district_name}}</p>
              </div>
              @endif
              </div>
              <div class="mujib-year">
                <img src="{{ asset('mujib_year.png')}}" width="50" height="48" alt="">
              </div>
            </div><!--card header end-->
            <div class="hr-line p-0 my-2"></div>
            <!--smart card seba begin-->
            <div class="d-flex justify-content-center my-1">
              <div class="nagorik-card-seba"><p>স্মার্ট কার্ড সেবা</p></div>
            </div><!--smart card seba end-->
            <!--card and pin begin-->
            <div class="card-pin-area d-flex justify-content-center mt-3">
              <div class="card-pin-no">
                <div class="card-no mb-2">
                  <p>কার্ড নং <span>{{$data->card_number}}</span></p>
                </div>
                <div class="pin-no">
                  <p>পিন নং <span>{{$data->pin_number}}</span></p>
                </div>
              </div>
            </div><!--card and pin end-->
            <!-- <div class="qr-code">
                <img src="{{ asset('qr_code.png')}}" width="35" height="35" alt="">
                <p>সেবা পেতে QR স্ক্যান করে লগইন করুন </p>
              </div> -->
            <!-- <div class="card-issue">
              <p>কার্ড ইস্যু তারিখঃ ০৫.০৩.২০২১</p>
            </div> -->
          </div>
        </div><!--/card-->
      </div><!--/col-->
    </div><!--/row-->
    <div class="row mt-2">
      <div class="col-md-4 offset-md-4 text-center">
        <button class="btn btn-sm btn-secondary" id="downloadBtn">Download Card</button>
      </div>
    </div>
      

  </div><!--/container-->
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
        html2canvas(document.querySelector('#capture'), {
            onrendered: function(canvas) {
            // document.body.appendChild(canvas);
            return Canvas2Image.saveAsPNG(canvas);
            }
        });
        });
    
  </script>
</body>
</html>
