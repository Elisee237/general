<?php

  class Employe {
      private $valid;

      private $err;
      public function ajout($nom, $prenom, $telephone, $sexe, $date, $adresse, $agence, $departement, $poste, $contrat, $embauche, $salaire){

        global $DB; 

        $nom= ucfirst(trim($nom));
        $prenom= trim($prenom);
        $telephone= trim($telephone);
        $sexe= trim($sexe);
        $date= trim($date);
        $adresse= trim($adresse);
        $agence= trim($agence);
        $departement= trim($departement);
        $poste= trim($poste);
        $contract= trim($contrat);
        $embauche= trim($embauche);
        $salaire= trim($salaire);

         $this->valid = (boolean) true;

         if(empty($nom)){
          $this->valid= false;
         $this->err= "Le nom est obligatoire";
     }
     else{
         $req = $DB->prepare("SELECT numerodetelephone FROM employe WHERE numerodetelephone = ?"); 
         $req->execute(array($telephone));
         $req = $req->fetch();

         if(($req['numerodetelephone'])!==null){
             $this->valid= false;
             $this->err= "Cette employe existe deja";
         }
     }
     if(empty($agence)){
         $this->valid= false;
         $this->err= "L'agence est obligatoire";
     }
     if(empty($poste)){
         $this->valid= false;
         $this->err= "Le poste est obligatoire";
     }
     if(empty($embauche)){
         $this->valid= false;
         $this->err= "la date d'embauche est obligatoire";
     }
     if(empty($salaire)){
         $this->valid= false;
         $this->err= "Le salaire de base est obligatoire";
     }
     if($this->valid){
         $req = $DB->prepare("INSERT INTO employe (idAgence, numerodetelephone, id_service,noms, 
                                   prenoms, dateDeNaissance, adresse, sexe, typeDeContrat, dateD_embauche, salaire) 
                       VALUES (?,?,?,?,?,?,?,?,?,?,?)");
         $req->execute(array($agence, $telephone, $poste,$nom,$prenom, $date, $adresse, $sexe, $contrat, $embauche, $salaire));

         header('Location: ajouter_employe.php');

     }
     else{
         echo "nok";
     }
      return [$this->err_user];
     


      }

      public function modifier($nom, $prenom, $telephone, $sexe, $date, $adresse, $agence, $departement, $poste, $contrat, $embauche, $salaire, $mat){

        global $DB; 

        $nom= ucfirst(trim($nom));
        $prenom= trim($prenom);
        $telephone= trim($telephone);
        $sexe= trim($sexe);
        $date= trim($date);
        $adresse= trim($adresse);
        $agence= trim($agence);
        $departement= trim($departement);
        $poste= trim($poste);
        $contract= trim($contrat);
        $embauche= trim($embauche);
        $salaire= trim($salaire);

         $this->valid = (boolean) true;

         if(empty($nom)){
          $this->valid= false;
         $this->err= "Le nom est obligatoire";
     }
     /*else{
         /*$req = $DB->prepare("SELECT numerodetelephone FROM employe WHERE numerodetelephone = ?"); 
         $req->execute(array($telephone));
         $req = $req->fetch();

         if(($req['numerodetelephone'])!==null){
             $this->valid= false;
             $this->err= "Cette employe existe deja";
         }
     }*/
     if(empty($agence)){
         $this->valid= false;
         $this->err= "L'agence est obligatoire";
     }
     if(empty($poste)){
         $this->valid= false;
         $this->err= "Le poste est obligatoire";
     }
     if(empty($embauche)){
         $this->valid= false;
         $this->err= "la date d'embauche est obligatoire";
     }
     if(empty($salaire)){
         $this->valid= false;
         $this->err= "Le salaire de base est obligatoire";
     }
     if($this->valid){
        $req = $DB->prepare("UPDATE employe 
        SET idAgence = ? ,id_service = ?,
        numerodetelephone= ? ,noms= ? ,`prenoms= ? ,dateDeNaissance= ? ,
        adresse= ? ,`sexe= ? ,typeDeContrat= ? ,dateD_embauche= ? ,
        salaire= ?
        WHERE matricule = ?");
        $req->execute(array($agence, $poste, $telephone,$nom,$prenom, $date, $adresse, $sexe, $contrat, $embauche, $salaire,$this->mat));
        $req = $req->fetch();

        header('Location: modifier_profil.php');
     }
     else{
         echo "nok";
     }
      return [$this->err];
     


      }
    }
    ?>