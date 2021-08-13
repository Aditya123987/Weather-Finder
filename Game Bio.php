<?php
$weather="";
$error="";
if(array_key_exists("city",$_GET)){
  $the = str_replace(' ', '', $_GET['city']);
  $file_headers = @get_headers("https://www.weather-forecast.com/locations/".$the."/forecasts/latest");
if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
    $error="City cant be found..";
}
else {
   

  $gamepage=file_get_contents("https://www.weather-forecast.com/locations/".$the."/forecasts/latest");
  
 $pagearray=explode('Providing a local hourly',$gamepage);
 if(sizeof($pagearray)>1){
 $secondpage=explode('</p></div><a class="read-more-label read-more-label-unused" href="#">Read More</a></div></div></div></div></section><section class="row expanded"><div class="small-12 column without-right">',$pagearray[1]);
 if(sizeof($secondpage)>1){
 $weather= $secondpage[0];
} 
else{
  $error="City cant be found..";
}
 }
else{
  $error="City cant be found";
}}}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Game Bio</title>
    <style type="text/css">
html { 
  background: url("81a7b6b663c25e54ac0bafa57d4c11f1.jpg") no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
    opacity: 0.8;
}

body{
    background:none;
    
}
.container{
    text-align:center;
    margin-top:200px;
    opacity:100;
    width:400px;
  

}
h1{
    color:black;
}
h4{
    color:black;
}
#line{
    height:1px;
    width:100%;
    border-top:1px solid black;
}
.form-label{
    color:black;
}
#weather{
margin-top:10px;
}

</style>
  </head>
  <body>
    <div class="container">
        <h1>Explore Weather</h1>
        <div id="line"></div>
        <h4>Enter the name of city,Carl:</h4>
  
<form>
  <div class="mb-3">
    <label for="Game" class="form-label"><h4>Name</h4></label>
    <input type="text" class="form-control" name="city" id="city"
    
    
    
    
    value="<?php 
    
    if(array_key_exists("city",$_GET)){
    
    echo $_GET["city"];} ?>">
   
  </div>
  
  
  <button type="submit" class="btn btn-primary">Search</button>
</form>
<div id="weather">
<?php
if($weather){
  echo ('<div class="alert alert-success" role="alert">'.$weather.'
  
</div>');
}
else if($error){
  echo ('<div class="alert alert-danger" role="alert">'.$error.'
  
  </div>');
}


?>

</div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>