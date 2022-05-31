<?php

  class Connexion {
      private $valid;

      private $err_user;
      private $err_pass;
      public function verification_connexion($username,$password){

        global $DB; 

         $username = ucfirst(trim($username));
         $password = trim($password);

         $this->valid = (boolean) true;

         if(empty($username)){
            $this->valid = false;
             $this->err_user = "Ce champ ne peut pas etre vide";
         }

         if(empty($password)){
             $this->valid = false;
             $this->err_pass = "Ce champ ne peut pas etre vide";
         }

         if($this->valid){
             echo "ok";
             $req = $DB->prepare("SELECT mot_de_passe FROM utilisateur WHERE username = ?");
             $req->execute(array($username));

             $req= $req->fetch();

             if(isset($req['mot_de_passe'])){
                 echo "ok";
                 if(strcmp($password, $req['mot_de_passe']) != 0){
                     echo "nok";
                     $this->valid = false;
                     $this->err_pass = "Le mot de passe est incorrecte";
                 }
             }else{
                 $this->valid = false;
                 $this->err_user = "Cet Utilisateur n'existe pas";
             }
         }


         if($this->valid){
             $req = $DB->prepare("SELECT * FROM utilisateur WHERE username = ?");
             $req->execute(array($username));

             $req_user = $req->fetch();

             if(isset($req_user['matricule'])){
                 $date_connexion = date('d-m-Y H:i:s');

                 $req = $DB->prepare("UPDATE utilisateur SET date_connexion = ? WHERE id = ?");
                 $req->execute(array($date_connexion, $req_user['matricule']));


                 $_SESSION['matricule'] = $req_user['matricule'];
                 $_SESSION['username'] = $req_user['username'];
                 $_SESSION['mot_de_passe'] = $req_user['mot_de_passe'];

                 header('Location: Presentation/home.php');
             }else{
                 $this->valid = false;
                 $this->err_user = "La combinaison est incorrecte";
             }
         }
         return [$this->err_user, $this->err_pass];
      }
  }

?>