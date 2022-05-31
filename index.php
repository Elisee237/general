<?php
   
require_once('include.php');
 
 if(isset($_SESSION['matricule'])){
     header('Location: Presentation/home.php');
 }

 if(!empty($_POST)){
     extract($_POST);

     if(isset($_POST['valider'])){
        
        [$err_user, $err_pass] = $_Connexion->verification_connexion($username, $password);
         
     }
        }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>General Express</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background: linear-gradient(-146deg, black 4%, white), #4195f7;">
    <div class="container" style="background: #ffffff;width: 827px;border-radius: 20px;margin-top: 300px;height: 391.6px;">
        <div class="row" style="height: 413.6px;">
            <div class="col-md-6 d-lg-flex justify-content-lg-center align-items-lg-center" style="background: url(&quot;assets/img/general.png&quot;) center / contain no-repeat;height: 348.6px;width: 405.5px;">
                <div></div>
            </div>
            <div class="col-md-6" style="height: 425.6px;">
                <div>
                    <form method='post'>
                        <div style="height: 72.6px;">
                            <p style="font-size: 20px;font-weight: bold;text-align: center;width: 348px;height: 30.6px;">CONNEXION DE L'UTILISATEUR</p>
                        </div>
                    </div><?php if(isset($err_user)){echo '<div style="background: #ff8877">' .$err_user. '</div>';}?>
                    <div style="background: var(--bs-gray-400);border-radius: 10px;padding: 10px;"><i class="fa fa-user" style="color: rgb(157,157,157);font-size: 22px;"></i><input type="text" name="username" id="username" value="<?php if(isset($username)){echo $username ;} ?>" style="background: rgba(255,255,255,0);border-style: none;margin-left: 15px;width: 330.6px;" placeholder="Username"></div>
                    <div style="background: var(--bs-gray-400);border-radius: 10px;padding: 10px;margin-top: 20px;"><?php if(isset($err_pass)){echo '<div style="background: #ff8877">' .$err_pass. '</div>';}?><i class="fa fa-lock" style="height: 21px;color: rgb(139,141,143);font-size: 21px;"></i><input type="password" name="password" style="background: rgba(255,255,255,0);border-style: none;margin-left: 15px;color: rgb(139,141,143);width: 327.6px;" placeholder="Password"></div>
                    <div style="margin-top: 30px;"><a href="#" style="margin-top: 4px;padding-top: 9px;">Mot de passe oublie ????</a></div></div>
                     <div style="border-radius: 20px;padding: -60px;margin-top: -100px;margin-left: 400px;color: #f6f8f6;"><button class="btn btn-primary" name="valider"  type="submit" style="border-radius: 20px;width: 369.75px;height: 65px;background: rgb(49,201,73);margin-top: -26px;">Se Connecter</button></div>
                   </form>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>