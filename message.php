<?php

session_start();

extract($_POST);
if(isset($_POST['langue'])){
  $langue = $_POST['langue'];
}
if($langue == 1){
  echo "Bonjour";
}
if($langue == 2){
  echo "Hello";
}
if($langue == 3){
  echo "Hola";
}
?>