
<?php
class table {
  
  private $tab = array();
  private $count = 1;
  
  function __construct(){
    
  }
  
  function table($arg){
    $this::__construct();
    if($arg != null){
    $i = 0;
    foreach($arg as $value){
      $this->tab[$i] = $value;
      $i++;
    }
  }
  }
  
  public function __toString(){
    echo "<table border=1><thead><tr>";
    if(sizeof($this->tab)>0){
    foreach($this->tab[0] as $value){
      echo "<th>".$value."</th>";
    }
    echo "</tr></thead>";
    for($cou=1;$cou<$this->count;$cou++){
      echo "<tr>";
      foreach($this->tab[$cou] as $value){
        echo "<td>".$value."</td>";
      }
      echo"</tr>";
    }
    return "";
    }
    else{
      return "empty";
    }
  }
  
  public function set_header($arg){
    $this->tab[0]=$arg;
  }
  
  public function add_row($arg){
    $this->tab[$this->count]=$arg;
    $this->count++;
  }
  
}
?>
