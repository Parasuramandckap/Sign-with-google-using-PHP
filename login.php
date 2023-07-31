<?php 
  session_start();
  
  include "gc_config.php";
  
  if(isset($_GET["code"])){
//      echo "<pre>";
//      var_dump($_GET);
//      echo "</pre>";
    $token=$client->fetchAccessTokenWithAuthCode($_GET["code"]);

    $client->setAccessToken($token["access_token"]);
    
    $obj=new Google_Service_Oauth2($client);
    $data=$obj->userinfo->get();
    var_dump($data);
    
    if(!empty($data->email)&&!empty($data->name)){
      
      //if you want to register user details, place mysql insert query here
      
      $_SESSION["email"]=$data->email;
      $_SESSION["name"]=$data->name;
      header("location:home.php");
    }
  }
?>
<html>
  <head>  
    <title>Sign With Google Account in PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <head>
  <body>
    <div class='container mt-5 text-center'>
      <h2>Sign With Google Account in PHP</h2><br>
      <a href='<?php echo  $client->createAuthUrl(); ?>' class='btn btn-dark'>Sign With Google</a>
    </div>
  </body>
</html>