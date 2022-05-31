<?php

require_once('../../include.php');

//var_dump($_POST); 
if(!empty($_POST)){
     extract($_POST);

     $valid=(boolean)true;

    if(isset($_POST['valider'])){
        echo "ok";
    }else{
        echo "nok";
    }

        $user=trim($user);
        $pass=trim($pass);
        $employe=trim($employe);

        if(empty($user)){
             $valid= false;
           // $err= "Le loign est Obligatoire";
        }
        else{
            $req = $DB->prepare("SELECT username FROM utilisateur WHERE username = ?"); 
            $req->execute(array($user));
            $req = $req->fetch();

            if(($req['username'])!==null){
                $valid= false;
                $err= "Cette utilisateur existe deja";
            }
        }
        if(empty($pass)){
            $valid= false;
           //$err_pass= "Le mot de passe est obligatoire";
       }
       else{
           $req = $DB->prepare("SELECT mot_de_passe FROM utilisateur WHERE mot_de_passe = ?"); 
           $req->execute(array($pass));
           $req = $req->fetch();

           if(($req['mot_de_passe'])!==null){
               $valid= false;
               $err_pass= "Ce mot de passe est deja utiliser";
           }
       }
        
        if($valid){

            //$pass = crypt($pass, '$6$rounds=5000$usesomesillystringforsalt$');
            $req = $DB->prepare("INSERT INTO utilisateur (matricule, username, mot_de_passe) 
                          VALUES (?,?,?)");
            $req->execute(array($employe, $user, $pass));

            header('Location: ajouter_utilisateur.php');

        }
        else{
            echo "nok";
        }

        

     }

     $requete2 = $DB->prepare("SELECT noms,matricule FROM employe");
     $requete2->execute();

     $req_dept = $requete2->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ajouter</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background: linear-gradient(white, black);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="height: 54px;"></div>
            </div>
        </div>
        <div class="row" style="background: var(--bs-gray-400);border-radius: 20px;width: 883px;font-size: 16px;margin-left: 15px;height: default;border-style: ridge;border-color: rgb(0,0,0);">
            <div class="col-md-12" style="width: 967px;">
                <div>
                <div style="background: rgba(237,27,27,0);">
                   <form method="post">
                        <p style="text-align: center;font-size: 32px;font-family: calibri corp;font-weight: bold;color: var(--bs-gray-900);">Ajouter un Nouvel Utilisateur</p>
                    </div>
                    <div>
                        <form action="">
                        <div style="border-radius: 10px;border: 4px solid rgb(16,37,58);height: 200.3px;">
                            <p style="margin-left: 15px;font-size: 24px;font-weight: bold;font-family: Aclonica, sans-serif;">Choisissez l'employe</p>
                            <div style="width: 428px;margin-left: 10px"><?php if(isset($err1)){echo '<div style="background: #ff8877">' .$err1. '</div>';}?>
                                <p style="margin-left: 26px;">Selectionner l'employe :&nbsp;</p>
                                <select name="employe" value="" id="employe" type="text" style="background: rgba(255,255,255,0);border-radius: 10px;border-width: 3px;font-size: 20px;width: 386.4px;height: 46.6px;margin-top: -13px;"
                                    >
                                    <option value="<?php if(isset($employe)){echo $employe ;} ?>"></option>
                                    <?php foreach($req_dept as $rd): ?>
                                      <option value="<?= $rd['matricule'] ;?>"><?= $rd['noms'] ;?></option>
                                      <?php endforeach ; ?></select></div>
                            <a href="ajouter_employe.php" style="margin-top: 13px;margin-bottom: 0px;margin-left: -724px;padding-top: 0px;margin-right: 0px;">Creer un Employe&nbsp;</a>
                        </div>
                        <div <?php if(empty($employe)){echo 'class="invisible"';}?> style="border-radius: 10px;border: 4px solid rgb(16,37,58);height: auto;margin-top: 23px;width: 856.2px;">
                            <p style="margin-left: 15px;font-size: 24px;font-weight: bold;font-family: Aclonica, sans-serif;">Informations Utilisateurs</p>
                            <div style="width: 428px;"><?php if(isset($err)){echo '<div>' .$err. '</div>';}?>
                                <p style="margin-left: 26px;">Entrez le login :</p><input type="text" name="user" style="background: rgba(255,255,255,0);border-radius: 10px;border-width: 3px;font-size: 20px;width: 386.4px;height: 46.6px;margin-top: -13px;margin-left: 15px;margin-bottom: 23px;" placeholder="Entrez le login de l'utilisateur">
                            </div>
                            <div style="width: 428px;margin-top: -97px;margin-left: 457px;"><?php if(isset($err_pass)){echo '<div>' .$err_pass. '</div>';}?>
                                <p>Entrez le mot de passe</p><input type="text" name="pass" style="background: rgba(255,255,255,0);border-radius: 10px;border-width: 3px;font-size: 20px;width: 386.4px;height: 46.6px;margin-top: -13px;margin-bottom: 23px;" placeholder="Entrez le mot de passe de l'utilisateur">
                            </div>
                        </div>
                        <div><button class="btn btn-primary visible" type="submit" name="valider" style="margin-left: 70%;height: 37px;width: 117.0125px;margin-top: 8px;background: rgb(25,99,42);">OK</button><button class="btn btn-primary visible" type="button" style="margin-left: 26px;margin-top: 6px;width: 112.3px;background: #fd380d;">Annuler</button></div>
    </form>
                    </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>