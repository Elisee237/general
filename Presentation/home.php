<?php

   
   require_once("../include.php");

   if(isset($_SESSION['matricule'])){
       $var = "BIENVENUE " . $_SESSION['username'];
   }else{
       header('Location: ../');
   }

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php
       require_once("../_head/meta.php");
       require_once("../_head/link.php");
       require_once("../_head/script.php");
       
    ?>
    <title>General Express Voyage</title>

</head>

<body>

    <?php require_once("../_menu/head.php");?>
    <?php require_once("../_footer/footer.php");?>

</body>

</html>
