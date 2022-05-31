
<?php

require_once('../../include.php');

if(!empty($_POST)){
    extract($_POST);

    $valid=(boolean)true;

    if(isset($_POST['oki'])){
      $tri = trim($tri);

      if(empty($tri)){
          $valid = false;
}}}
$req = $DB->prepare("SELECT *
                     from utilisateur,employe
                     WHERE employe.matricule=utilisateur.matricule
                     ORDER BY noms");
          $req->execute();

          $req_membres = $req->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Liste Utilisateurs</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>


     <h1><center>LISTE DES UTILISATEURS </center></h1>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="background: rgba(173,181,189,0);border-radius: 5px;">
                <div>
                    
                    <div>
                        <div style="width: 100%;"></div>
                        <div style="height: 83px; width: 100%"> 
                            <a class="btn btn-primary" href="print.php" type="button" style="width: 116.6px;background: orange;">Imprimer&nbsp;<i class="fa fa-print"></i></a>
                            <label for="text" style="margin-left: 450px;margin-top: 80px;">Trier par :</label>
                            <form method="post"  style="margin-top: -35px;">
                            <select class="form-select-sm" style="margin-left: 670px;margin-top: -50px;" name='tri'>
                                <optgroup label="Trier par :">
                                    <option value="matricule" selected="matricule"><a href="liste_employe.php?tri=matricule">Matricule</a></option>
                                    <option value="noms"><a href="liste_employe.php?tri=nom">nom</a></option>
                                    <option value="nomService"><a href="liste_employe.php?tri=poste">poste</a></option>
                                    <option value="nom">Agence</option>
                                    <option value="age">Age</option>
                                </optgroup>
                            </select>
                        
                        </form></div>
                            
                            <input type="search" style="margin-left: 1070px;margin-top: -194px;border-width: 2px;border-style: solid;width: 191.6px;margin-right: 3px;transform: perspective(240px);
                            padding-right: 0px;" placeholder="Rechercher un employe">
                            
                    </div>
                    <div style="border-width: 3px;border-style: dotted; margin-top: 20px;">
                        <div class="table-responsive">
                            <table class="table">
                                <thead style="width: 948.6px;border-width: 2px;border-color: rgb(0,0,0);">
                                    <tr>
                                        <th style="width: 67.2px;border-width: 1px;border-style: solid;">N*</th>
                                        <th style="width: 159.2px;border: 1px solid rgb(0,0,0) ;">Noms</th>
                                        <th style="width: 176.8px;border: 1px solid rgb(0,0,0) ;">Prenoms</th>
                                        <th style="width: 164.2px;border-width: 1px;border-style: solid;">N* Telephone</th>
                                        <th style="border-width: 1px;border-style: solid;"><center>Action 1</center></th>
                                        <th style="border-width: 1px;border-style: solid;"><center>Action 2</center></th>
                                        <th style="border-width: 1px;border-style: solid;"><center>Action 3</center></th>
                                    </tr>
                                </thead>
                                <tbody><?php  foreach($req_membres as $rm): ?>
                                    <tr style="border: 1px solid rgb(0,0,0) ;">
                                        <td style="border: 1px solid rgb(0,0,0) ;"><?= $rm['matricule'];?></td>
                                        <td style="border: 1px solid rgb(0,0,0) ;"><?= $rm['noms'];?></td>
                                        <td style="border: 1px solid rgb(0,0,0) ;"><?= $rm['prenoms'];?></td>
                                        <td style="border-width: 1px;border-style: solid;"><?= $rm['numerodetelephone'];?></td>
                                        <td style="border: 1px solid rgb(0,0,0) ;"><center><a class="btn btn-primary" href="supprimer.php?matricule=<?= $rm['matricule'] ?>" type="button" style="width: 116.6px;background: rgb(215,58,48);">Supprimer&nbsp;<i class="fa fa-trash"></i></button></center></td>
                                        <td style="border: 1px solid rgb(0,0,0) ;"><center><a class="btn btn-primary" href="../Ajouter/modifier_profil.php?matricule=<?= $rm['matricule'] ?>" type="button" style="width: 107.4px;background: rgb(253,200,13);">Modifier&nbsp;<i class="fa fa-edit"></i></button></center></td>
                                        <td style="border: 1px solid rgb(0,0,0) ;"><center><a class="btn btn-primary" href="profil.php?matricule=<?= $rm['matricule'] ?>" type="button" style="width: 107.4px;background: green;">Afficher&nbsp;<i class="fa fa-user"></i></button></center></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>