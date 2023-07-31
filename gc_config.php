<?php 
  require "google-api-php-client/vendor/autoload.php";
  
  $clientId="928709130220-8upcm1v8k58mfbm9rv5jjsnb3j71i59g.apps.googleusercontent.com";
  $clientSecret="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";
  $redirectURI="http://localhost:8000/sample/login.php";
  
  $client=new Google_Client();
  $client->setClientId($clientId);
  $client->setClientSecret($clientSecret);
  $client->setRedirectURI($redirectURI);
  $client->addScope("email");
  $client->addScope("profile");
?>