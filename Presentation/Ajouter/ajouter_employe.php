<?php

require_once('../../include.php');

 if(!empty($_POST)){
     extract($_POST);

     $valid=(boolean)true;

     if(isset($_POST['Valider'])){

         [$err] = $_Employe->ajout($nom, $prenom, $telephone, $sexe, $date, $adresse, $agence, $departement, $poste, $contrat, $embauche, $salaire);


     }}

     $requete1 = $DB->prepare("SELECT nom,idAgence FROM agence");
     $requete1->execute(array());

     $req_agence = $requete1->fetchAll();

     $requete1 = $DB->prepare("SELECT nomDept,idDept FROM departement");
     $requete1->execute(array());

     $req_dept = $requete1->fetchAll();

     $requete1 = $DB->prepare("SELECT nomservice,idService FROM service");
     $requete1->execute(array());

     $req_poste = $requete1->fetchAll();
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

<body style="background: linear-gradient(black, white);">
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
                        <form action="" method="post">
                            <p style="text-align: center;font-size: 32px;font-family: calibri corp;font-weight: bold;color: var(--bs-gray-900);">Ajouter un Nouvel Employe</p>
                    </div>
                    <div><?php if(isset($err)){echo '<div style="background: #ff8877">' .$err. '</div>';}?>
                        <div style="border-radius: 10px;border: 4px solid rgb(16,37,58);height: 287.3px;">
                            <p style="margin-left: 15px;font-size: 24px;font-weight: bold;font-family: Aclonica, sans-serif;">Informations Personnelles</p>
                            <div style="width: 428px;">
                                <p style="margin-left: 26px;">Entrez le nom :&nbsp;</p><input name="nom" value="<?php if(isset($nom)){echo $nom ;} ?>" id="nom" type="text" style="background: rgba(255,255,255,0);border-radius: 10px;border-width: 3px;font-size: 20px;width: 386.4px;height: 46.6px;margin-top: -13px;margin-left: 15px;"
                                    placeholder="Entrez le nom de l'employe">
                            </div>
                            <div style="width: 428px;margin-top: -76px;margin-left: 457px;">
                                <p>Numero de Telephone :&nbsp;</p>
                                <div><i class="fa fa" style="font-size: 22px;"></i><input name="telephone" value="<?php if(isset($telephone)){echo $telephone ;} ?>" id="telephone" type="text" style="background: rgba(255,255,255,0);border-radius: 10px;font-size: 20px;width: 392.4px;height: 46.6px;margin-top: -13px;border-width: 3px;margin-left: -5px;"
                                        placeholder="+237 691129769"></div>
                            </div>
                            <div style="width: 428px;">
                                <p style="margin-left: 26px;">Entrez le Prenom :&nbsp;</p><input name="prenom" id="prenom" value="<?php if(isset($prenom)){echo $prenom ;} ?>" type="text" style="background: rgba(255,255,255,0);border-radius: 10px;border-width: 3px;font-size: 20px;width: 386.4px;height: 46.6px;margin-top: -13px;margin-left: 15px;"
                                    placeholder="Entrez le prenom de l'employe">
                            </div>
                            <div style="width: 428px;margin-top: -70px;margin-left: 457px;">
                                <p>Sexe :&nbsp;</p>
                                <div class="form-check" style="width: 79px;"><input name="sexe" id="sexe" class="form-check-input" type="radio" value="m" checked="checked"><label class="form-check-label" for="formCheck-2">M</label></div>
                                <div class="form-check" style="width: 88px;margin-left: 59px;margin-top: -28px;"><input name="sexe" id="sexe" class="form-check-input" type="radio" value="f"><label class="form-check-label" for="formCheck-1">F</label></div>
                            </div>
                            <div style="width: 428px;">
                                <p style="margin-top: 6px;margin-left: 26px;">Date de Naissance :&nbsp;</p><input name="date" id="date" value="<?php if(isset($date)){echo $date ;} ?>" type="date" style="width: 384.6px;height: 43px;margin-top: -11px;border-radius: 10px;background: rgba(255,255,255,0);margin-left: 15px;" value="Date de naissance"
                                    min="31/12/2004">
                            </div>
                            <div style="width: 428px;margin-top: -76px;margin-left: 457px;">
                                <p>Adresse :</p><input name="adresse" value="<?php if(isset($adresse)){echo $adresse ;} ?>" id="adresse" type="text" style="background: rgba(255,255,255,0);border-radius: 10px;border-width: 3px;font-size: 20px;width: 386.4px;height: 46.6px;margin-top: -13px;" placeholder="Entrez l'adresse"
                                    value=" ">
                            </div>
                        </div>
                        <div style="border-radius: 10px;border: 4px solid rgb(16,37,58);height: 287.3px;margin-top: 23px;">
                            <p style="margin-left: 15px;font-size: 24px;font-weight: bold;font-family: Aclonica, sans-serif;">Informations Professionelles</p>
                            <div style="width: 428px;">
                                <p style="margin-left: 26px;">Entrez le nom de l'agence :&nbsp;</p>
                                <select name="agence" id="agence" style="background: rgba(255,255,255,0);border-radius: 10px;border-width: 3px;font-size: 20px;width: 386.4px;height: 46.6px;margin-top: -13px;margin-left: 15px;" placeholder="Entrez le nom de l'agence">
                                      <?php foreach($req_agence as $ra): ?>
                                      <option value="<?= $ra['idAgence'] ;?>"><?= $ra['nom'] ;?></option>
                                      <?php endforeach ; ?>
                                </select>
                            </div>
                            <div style="width: 428px;margin-top: -76px;margin-left: 457px;">
                                <p>Entrez le departement affecte :</p><select name="departement" id="departement" type="text" style="background: rgba(255,255,255,0);border-radius: 10px;border-width: 3px;font-size: 20px;width: 386.4px;height: 46.6px;margin-top: -13px;"
                                    placeholder="Entrez le nom du departement">
                                    <?php foreach($req_dept as $rd): ?>
                                      <option value="<?= $rd['idDept'] ;?>"><?= $rd['nomDept'] ;?></option>
                                      <?php endforeach ; ?></select>
                            </div>
                            <div style="width: 428px;">
                                <p style="margin-left: 26px;">Entrez le Poste occupe :&nbsp;</p>
                                <select name="poste" id="poste" type="text" style="background: rgba(255,255,255,0);border-radius: 10px;border-width: 3px;font-size: 20px;width: 386.4px;height: 46.6px;margin-top: -13px;margin-left: 15px;" placeholder="Entrez le poste de l'employe">
                                <?php foreach($req_poste as $rp): ?>
                                      <option value="<?= $rp['idService'] ;?>"><?= $rp['nomservice'] ;?></option>
                                      <?php endforeach ; ?></select>
                            </div>
                            <div style="width: 428px;margin-top: -74px;margin-left: 457px;">
                                <p>Type de contrat :</p><input name="contrat" value="<?php if(isset($contrat)){echo $contrat ;} ?>" id="contrat" type="text" style="background: rgba(255,255,255,0);border-radius: 10px;border-width: 3px;font-size: 20px;width: 386.4px;height: 46.6px;margin-top: -13px;" placeholder="Entrez le type de contrat">
                            </div>
                            <div style="width: 428px;">
                                <p style="margin-top: 6px;margin-left: 26px;">Date d'embauche :&nbsp;</p><input name="embauche" value="<?php if(isset($embauche)){echo $embauche ;} ?>" id="embauche" type="date" style="width: 384.6px;height: 43px;margin-top: -11px;border-radius: 10px;background: rgba(255,255,255,0);margin-left: 15px;" min="31/12/2004">
                            </div>
                            <div style="width: 428px;margin-top: -76px;margin-left: 457px;">
                                <p>Salaire de Base :&nbsp;</p><input name="salaire" value="<?php if(isset($salaire)){echo $salaire ;} ?>" id="salaire" type="text" style="background: rgba(255,255,255,0);border-radius: 10px;font-size: 20px;width: 392.4px;height: 46.6px;margin-top: -13px;border-width: 3px;margin-left: -5px;margin-right: 0px;"
                                    placeholder="1">
                            </div>
                        </div>
                        <div>
                            <input class="btn btn-primary" type="submit" value="Valider" name="Valider" style="margin-left: 550px;height: 37px;width: 117.0125px;background: rgb(25,99,42);">
                            <input class="btn btn-primary" type="reset" value="Annuler" style="margin-left: 26px;margin-top: 6px;width: 112.3px;background: #fd380d;">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>