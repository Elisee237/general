
<?php

require_once('../../include.php');

if(!empty($_POST)){
    extract($_POST);

        $tri= trim($tri);}
$req = $DB->prepare("SELECT nomService,nom,noms,prenoms,numerodetelephone,matricule
                     from agence,employe,service 
                     WHERE employe.idAgence=agence.idAgence 
                     AND employe.id_service=service.idService
                     ORDER BY nom");
$req->execute();

$req_membres = $req->fetchAll();

 //header('Location: liste_employe'); 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Listeemploye</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body onload="window.print()" >


     <h1><center>LISTE DES EMPLOYES </center></h1>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="background: rgba(173,181,189,0);border-radius: 5px;">
                <div>           
                        <div class="table-responsive">
                            <table class="table">
                                <thead style="width: 948.6px;border-width: 2px;border-color: rgb(0,0,0);">
                                    <tr>
                                        <th style="width: 67.2px;border-width: 1px;border-style: solid;">N*</th>
                                        <th style="width: 159.2px;border: 1px solid rgb(0,0,0) ;">Noms</th>
                                        <th style="width: 176.8px;border: 1px solid rgb(0,0,0) ;">Prenoms</th>
                                        <th style="width: 164.2px;border-width: 1px;border-style: solid;">N* Telephone</th>
                                        <th style="border-width: 1px;border-style: solid;">Poste</th>
                                        <th style="border-width: 1px;border-style: solid;">Agence</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  foreach($req_membres as $rm): ?>
                                    <tr style="border: 1px solid rgb(0,0,0) ;">
                                        <td style="border: 1px solid rgb(0,0,0) ;"><?= $rm['matricule'];?></td>
                                        <td style="border: 1px solid rgb(0,0,0) ;"><?= $rm['noms'];?></td>
                                        <td style="border: 1px solid rgb(0,0,0) ;"><?= $rm['prenoms'];?></td>
                                        <td style="border-width: 1px;border-style: solid;"><?= $rm['numerodetelephone'];?></td>
                                        <td style="border: 1px solid rgb(0,0,0) ;"><?= $rm['nomService'] ?></td>
                                        <td style="border: 1px solid rgb(0,0,0) ;"><?= $rm['nom'];?></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>