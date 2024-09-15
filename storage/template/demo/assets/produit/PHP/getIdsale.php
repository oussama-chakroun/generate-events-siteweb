<?php
require_once("../../../PHP/conexion.php");
$id=isset($_POST['id'])?$_POST['id']:'';
$res=mysqli_query($conexion,'SELECT idjour from jour where  idjour='.$id);
$var=null;

while($row=mysqli_fetch_array($res))
   $var=$row[0];

   if(!empty($var))
     echo '1';



?>
