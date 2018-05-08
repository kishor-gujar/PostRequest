<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <!-- <div class="bg"></div> -->

    <div class="container-fluid">
    <nav>
            <div class="row">
                <div class="col-md-4">

                </div>
                <div  class="links col-md-4 offset-md-4">
                    <a class="btn" href="#">HELP</a>
                    <a class="btn" href="#">ABOUT US</a>
                    <a class="btn" href="#">RECEIVERS</a>
                </div>
            </div>
            
        </nav>

        <div class="row">
            <div class="col-md-11 offset-md-1"><h2 style="color: white">I’m looking for</h2></div>
            <div class="col-md-5 offset-md-1">
              <div class="card">
                <div class="card-body looking-for">
                    <label>
                        <input type="radio" name="radio" checked/>
                        <div class="front-end box">
                            <span>Receiver Sub Type ICON CAR DEALERS</span>
                        </div>
                        </label>
                        
                        <label>
                        <input type="radio" name="radio"/>
                        <div class="back-end box">
                            <span>Receiver Sub Type ICON LAWYERS</span>
                        </div>
                    </label>
                    <label>
                        <input type="radio" name="radio" checked/>
                        <div class="front-end box">
                            <span>ESTATE AGENTS SELECTED SUB TYPE</span>
                        </div>
                        </label>
                        
                        <label>
                        <input type="radio" name="radio"/>
                        <div class="back-end box">
                            <span>Receiver Sub Type ICON HR CONSULTANTS</span>
                        </div>
                    </label>
                    <label>
                        <input type="radio" name="radio" checked/>
                        <div class="front-end box">
                            <span>Receiver Sub Type ICON Receiver Sub Type</span>
                        </div>
                        </label>
                        
                        <label>
                        <input type="radio" name="radio"/>
                        <div class="back-end box">
                            <span>Receiver Sub Type ICON Receiver Sub Type</span>
                        </div>
                    </label>
                </div>
                <div class="card-footer">
                    <button class="btn">Back</button>
                    <button style="float: right;" class="btn">Next</button>
                </div>
              </div>
            </div>
          </div>
    </div>
<div class="container-fluid" style="padding-left: 0;">
        <div class="row">
                <div class="col-12">
                    <footer>
                        <div class="footer-center">
                            <a href="#">Bottom of Page Banner – displays logo to the left, manageable text and external hyperlinks</a>
                        </div>
                    </footer>
                </div>
            </div>
</div>
   

</body>
</html>