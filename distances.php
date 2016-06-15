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
     <?php
     foreach($res as $value){
       echo "<tr>";
       echo "<td>".$value['nom']."</td>";
       $distance = mysqli_query($link,"select * from distance d, capitale c where c.id =".$value['id']." and c.id = d.id1");
       foreach($distance as $unite){
         echo "<td>".$unite['distance']."</td>";
       }
       echo "</tr>";  
     }
     ?>
  </table> 
</body>
</html>