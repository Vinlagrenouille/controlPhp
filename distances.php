<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Distances</title>
</head>
<body>
   <table border=1>
    <thead>
      <tr>
        <th></th>
     <?php
      include("parametres.inc.php");
      $link = mysqli_connect($host,$user,$password,$bdd);
      if(!$link){
      die("<p>Connexion au serveur impossible</p>");
      }
     $res = mysqli_query($link,"select * from capitale");
     foreach($res as $value){
       echo "<th>".$value['nom']."</th>";
     }
     ?>
      </tr>
    </thead>
  </table> 
</body>
</html>