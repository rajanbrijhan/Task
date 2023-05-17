<?php
$status="";
$msg="";
$city="";
if(isset($_POST['submit'])){
    $city=$_POST['city'];
    $url="http://api.openweathermap.org/data/2.5/weather?q=$city&appid=49c0bad2c7458f1c76bec9654081a661";
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $result=curl_exec($ch);
    curl_close($ch);
    $result=json_decode($result,true);
    if($result['cod']==200){
        $status="yes";
    }else{
        $msg=$result['message'];
    }
}
?>


   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Weather Task</title>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
    <!-- Font Awesome CSS Icons (For cool glyphicons) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="jumbotron container-fluid mt-2 text-center p-2" style="background-color:#007baa; ;color: white;">
        <h1> <strong>Weather Task</strong></h1>
    </div>
    <div class="container">
        
        <div class="row">
            <div class="col-sm-4 bg-light">
               
                <h4 class="pt-1"><strong>Search for a City:</strong></h4>
                
                <div class="input-group mb-3">
                    <input type="text" class="form-control"id="search-city" aria-label="City Search" aria-describedby="search-button">
                    <div class="input-group-append">
                        <button class=" btn bg-primary text-light" id="search-button"><i class="fa fa-search"></i></button>
                    </div>
                </div>
               
                <button class=" btn btn-primary" type="button" id="clear-history">Clear history</button>
                <ul class="list-group">

                </ul>
            </div>   
            <div class="col-sm-8">
                <div class="row ml-2 border border-dark rounded">
                    <div class="col-sm-12" id="current-weather">
                        <h3 class="city-name mb-1 mt-2 bolder" id="current-city"></h3>
                        <p>Temperature:<span class="current" id="temperature"></span></p>
                        <p>Humidity:<span class="current" id="humidity"></span></p> 
                        <p>Wind Speed:<span class="current" id="wind-speed"></span></p>
                        <p>UV index:<span class="current bg-danger rounded py-2 px-2 text-white" id="uv-index"></span></p> 
                    </div>
                </div>
                
                <div class="col-sm-12" id ="future-weather">
                    <h3>5-Day Forecast:</h3>
                    <div class="row text-light">
                        <div class="col-sm-2 bg-primary forecast text-white ml-2 mb-3 p-2 mt-2 rounded" >
                            <p id="fDate0"></p>
                            <p id="fImg0"></p>
                            <p>Temp:<span id="fTemp0"></span></p>
                            <p>Humidity:<span id="fHumidity0"></span></p>
                        </div>
                        <div class="col-sm-2 bg-primary forecast text-white ml-2 mb-3 p-2 mt-2 rounded" >
                            <p id="fDate1"></p>
                            <p id="fImg1"></p>
                            <p>Temp:<span id="fTemp1"></span></p>
                            <p>Humidity:<span id="fHumidity1"></span></p>
                        </div>
                        <div class="col-sm-2 bg-primary forecast text-white ml-2 mb-3 p-2 mt-2 rounded">
                            <p id="fDate2"></p>
                            <p id="fImg2"></p>
                            <p>Temp:<span id="fTemp2"></span></p>
                            <p>Humidity:<span id="fHumidity2"></span></p>
                        </div>
                        <div class="col-sm-2 bg-primary forecast text-white ml-2 mb-3 p-2 mt-2 rounded">
                            <p id="fDate3"></p>
                            <p id="fImg3"></p>
                            <p>Temp:<span id="fTemp3"></span></p>
                            <p>Humidity:<span id="fHumidity3"></span></p>
                        </div>
                        <div class="col-sm-2 bg-primary forecast text-white ml-2 mb-3 p-2 mt-2 rounded" >
                            <p id="fDate4"></p>
                            <p id="fImg4"></p>
                            <p>Temp:<span id="fTemp4"></span></p>
                            <p>Humidity:<span id="fHumidity4"></span></p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
   
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    
    <script src="script.js"></script>
</body>
</html>