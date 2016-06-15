<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Capitale</title>
</head>
<body>
  <h1>
    Capitales Européennes
  </h1>
  <?php
  include("parametres.inc.php");
  $link = mysqli_connect($host,$user,$password,$bdd);
  if(!$link){
    die("<p>Connexion au serveur impossible</p>");
  }
  $res = mysqli_query($link,"select id,nom from capitale");
  ?>
  <form method="get" action="capitale.php">
    <SELECT name='capi'>
    <?php
    foreach($res as $value){
       echo "<option value=".$value['id'].">".$value['nom'];
    }
    ?>
    </SELECT>
    <button type="submit">Submit</button>
  </form>
  <?php
  extract($_GET);
  if(isset($_GET['capi'])){
    $capi = $_GET['capi'];
    $res = mysqli_query($link,"select * from capitale where id = $capi");
    foreach($res as $value){
      echo $value['nom']."<br/>";
      echo "<img src=".$value['image']." alt='Image'>";
    }
    $res = mysqli_query($link,"select * from distance where id1 = $capi and id1 != id2");
    $min = 1000000;
    $max = 0;
    foreach($res as $value){
      if($value['distance'] < $min){
        $min = $value['distance'];
        $villeMin = $value['id2'];
      }
      if($value['distance'] > $max){
        $max = $value['distance'];
        $villeMax = $value['id2'];
      }
    }
    $resMin = mysqli_query($link,"select * from capitale where id = $villeMin");
    $resMax = mysqli_query($link,"select * from capitale where id = $villeMax");
    $villeMin = $resMin->fetch_row();
    $villeMax = $resMax->fetch_row();
    echo "<br/>Ville la plus proche :<br/><a href='capitale.php?capi=".$villeMin[0]."'><br/>".$villeMin[1]."</a>";
    echo "<br/> Distance :".$min;
    echo "<br/><br/><br/>Ville la plus loin :<br/><a href='capitale.php?capi=".$villeMax[0]."'><br/>".$villeMax[1]."</a>";
    echo "<br/> Distance :".$max;
  }
  ?>
</body>
</html>