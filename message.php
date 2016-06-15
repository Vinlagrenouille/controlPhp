<?php

session_start();

extract($_POST);
if(isset($_POST['langue'])){
  $langue = $_POST['langue'];
}
if($langue == 1){
  echo "Bonjour ";
  $_SESSION['msg']="Comment vas-tu ?";
}
if($langue == 2){
  echo "Hello ";
  $_SESSION['msg']="How do you do ?";
}
if($langue == 3){
  echo "Hola ";
  $_SESSION['msg']="Como estas ?";
}
include('question.php');
?>