<?php

    require_once('../../include.php');

    $get_mat = (int) $_GET['matricule'];
    if($get_mat <= 0){
        header('Location: liste_employe.php');
    }
         
    $req = $DB->prepare("DELETE FROM employe WHERE matricule = ?");
    $req->execute(array($get_mat));

    $req_user = $req->fetch();
        
                header('Location: liste_employe.php');
                echo "ok";
                 exit;

?>