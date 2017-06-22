<?php session_start() ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
        try
            {
            $bdd = new PDO('mysql:host=localhost;dbname=filmbay;charset=utf8', 'root', 'mvb94');
            $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            }catch (Exception $e)
            {
             die('Erreur : ' . $e->getMessage());}
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Login page</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
    </head>
    <?php include 'BayHeader.php'; ?>
    <body>
        <div class="">
            <form class="col-xs-offset-4 col-xs-4" method="post" action="BayLogin.php" style="border: #000 thin solid">
                <div class="input-group ">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="ID" placeholder="Identifiant">
                </div>
                <div class="input-group ">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="mot de passe"> 
                </div>
                <button type="submit" class="btn btn-success btn-lg btn-block"><span class="glyphicon glyphicon-check"></span></button>
            </form>
            <form class="";
        </div>
        <?php
         if(isset($_POST) && !empty($_POST['ID']) && !empty($_POST['password'])){
             try{
             $stmt = $bdd->prepare('SELECT * FROM Users WHERE Identifiant = :loginid');
             $stmt->bindValue(':loginid', $_POST['ID']);
             $stmt->execute();}
             catch (Exception $e){
             die('Erreur : '.$e->getMessage());
             }
             $donnees = $stmt->fetch(PDO::FETCH_ASSOC);
             $pass = filter_var(FILTER_SANITIZE_STRING, $donnees['Password']);
             if ($_POST['password'] = $donnees['Password']){
                 $_SESSION['ID'] = $donnees['Identifiant'];
                 $_SESSION['mdp'] = $donnees['Password'];
                 header('Location: filmk.php');
             }else {
                    echo 'mauvis identifiant/pw';
                    }
         }else{
          echo'<p>Vous avez oublié de remplir un champ.</p>';
             }
             
        ?>
    </body>
    <?php include 'BayFooter.php';?>

</html>
