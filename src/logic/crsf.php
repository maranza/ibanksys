<?php
//Prevents Crossite Frogery
$token = md5(time()+uniqid());
session_start();
 if (!isset($_SESSION['crsftoken'])){
    $_SESSION['crsftoken'] = $token;
 }

function clear_token(){
  global $token;
  //regenerate token;
  $_SESSION['crsftoken'] = $token;
}
 function check_token(){
     if($_POST['token'] != $_SESSION['crsftoken']){
        echo "Crossite forgery detected ..Reporting to Sys Admin";

      //  header("Location:logout.php");
        exit;
    }
    clear_token();
 }
function draw_tokenbox(){
  echo "<input type=\"hidden\" name=\"token\" value=\"".$_SESSION['crsftoken']."\"/>";


}
