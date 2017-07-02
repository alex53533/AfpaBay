<?php session_start();
if (empty($_SESSION['ID']))?>
<!DOCTYPE html>
<html>
    <?php
   include 'bddConnect.php';
    ?>
    <head>
        <title>AFPA bays tests</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="stylefilm.css"/>
    </head>
    
    <?php include 'BayHeader.php'; ?>
    <body class="">
        <div class="connexion col-xs-12 input-group col-xs-4 col-xs-offset-11"><a href="deconnection.php" role="button" class="btn btn-success">Connexion</a>
                                                                         </br> <a href="deconnection.php" role="button" class="btn btn-danger">Déconnection</a>
    </div>
<div class="recherche col-xs-12">
            <?php 
            $filtre = filter_input(INPUT_GET, 'recherche', FILTER_SANITIZE_STRING);
            if ($filtre){
                $bob = $bdd->prepare('SELECT * FROM film WHERE titre LIKE :recherche');
                $bob->bindValue(':recherche', '%'.$filtre.'%', PDO::PARAM_STR);
                $bob->execute();    
            }else {
                $bob = $bdd->query('SELECT * FROM film');
            }
            ?>
            <form>
                <div class="input-group col-xs-4 col-xs-offset-8">
                    <input type="text" class="form-control" placeholder="Recherche" name="recherche" value=<?php echo $filtre ?>>
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                      <i class="glyphicon glyphicon-search"></i>
                    </button>
                  </div>
                </div>
            </form> 
      <?php
      include "index.php";
      ?>
</div>
        <div id="main">
            <div id="ul">
                <div class="list-group">
                    <?php
                        if ($bob){ $reponse = $bob;}
                        while ($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
                            { 
                            echo'<a href="filmDetail.php?titre='.$donnees["titre"].'"class="list-group-item col-xs-6 col-lg-3 col-md-6">
                            <div class = "datacontainer col-xs-6 col-lg-6 col-md-6"> '.$donnees["titre"].'</div>
                            <div class = "datacontainer col-xs-6 col-lg-6 col-md-6"> '.$donnees['année'].'</div>
                            <div class = "datacontainer col-xs-6 col-lg-6 col-md-6"> '.$donnees['genre'].'</div></a>'
                            ;  
                            }
                            echo '</div>';
                    ?>
            </div>
            </div>
            
             <div class="col-xs-12 input-group col-xs-4 col-xs-offset-9"><a href="ajoutFilm.php" role="button" class="btn btn-info">Ajouter un film</a>
             </div>
    </body>
    <?php include 'BayFooter.php'; ?>
</html>