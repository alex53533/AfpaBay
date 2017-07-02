<?php 
session_start();
//$_SESSION['ID']=NULL;
include 'class.php';
$passP = new Log;
?>
<!DOCTYPE html>
<html>
    <?php
    $passP->Inscrit();
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Login page</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
    </head>
    <?php include 'BayHeader.php'; ?>
    <h3 class="col-xs-12 bg-info">Renseignez vos id pour vous connecter</h3>
    <body>
        <div class="">
            <form class="col-xs-offset-4 col-xs-4" method="post" action="BayLogin.php">
                <div class="input-group ">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="ID" placeholder="Identifiant">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="mot de passe"> 
                </div>
                <button type="submit" class="btn btn-success btn-lg btn-block"><span class="glyphicon glyphicon-check"></span></button>
            </form>
            <div  class="row container col-xs-offset-3 col-xs-6" id="regformdiv">
                <button id='register' class="col-xs-offset-3 col-xs-6 btn btn-lg btn-warning">Créer un compte utilisateur</button>
                <form method="post" action="BayLogin.php" id="register_form" class="">   
                </form>
                <script src="Registerbay.js"></script>
            </div>    
        </div>
        <?php
        $passP->Connect();
        ?>
    </body>
</html>