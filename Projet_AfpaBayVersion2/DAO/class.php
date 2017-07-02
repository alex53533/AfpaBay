<?php
include 'bddConnect.php';
class Add{
  public function AddFilm(){
    include 'bddConnect.php';
     $filmname = filter_input(INPUT_POST, 'filmname',FILTER_SANITIZE_STRING);
        $filmdate = filter_input(INPUT_POST, 'releaseD',FILTER_SANITIZE_NUMBER_INT);
        $filmreal = filter_input(INPUT_POST, 'filmreal',FILTER_SANITIZE_STRING);       
        $filmactor = filter_input(INPUT_POST, 'acteurs',FILTER_SANITIZE_STRING);
        $filmimage = 'images/'.$filmname.'jpg';
            if (!empty($filmactor) AND !empty($filmdate) AND !empty($filmreal) AND !empty($filmname)){
        $insert = $bdd->prepare('INSERT INTO film (titre, realisateur, acteurs, année, lienimage) VALUES (:titre, :realisateur, :acteurs, :annee, :image)');
        $insert->bindValue(':titre', $filmname, PDO::PARAM_STR);
        $insert->bindValue(':realisateur', $filmreal, PDO::PARAM_STR);
        $insert->bindValue(':acteurs', $filmactor, PDO::PARAM_STR);
        $insert->bindValue(':annee', $filmdate, PDO::PARAM_INT);
        $insert->bindValue(':image', $filmimage, PDO::PARAM_STR);
        $insert->execute();
            header('Location: filmk.php');}
  }
}

class Log{
    public function Inscrit(){
        include 'bddConnect.php';
        if (isset($_POST['newuserID'.'newpassword'.'newuserage'])){
         $NewID = filter_var($_POST['newuserID'], FILTER_SANITIZE_STRING);
         $NewPW = filter_var($_POST['newpassword'], FILTER_SANITIZE_STRING);
         $cryptedPW = password_hash($NewPW, PASSWORD_BCRYPT);
         
         $NewAge = filter_var($_POST['newuserage'],FILTER_SANITIZE_NUMBER_INT);
         
        if (!empty($NewID) AND !empty($NewPW) AND !empty($NewAge)){
            try {
            $IDexistant = $bdd->prepare('SELECT Identifiant FROM Users WHERE Identifiant = :newID');
            $IDexistant->bindValue(':newID', $NewID);
            $IDexistant->execute();
            $OldID = $IDexistant->fetch();
            echo $OldID['Identifiant'].'<br/>';
            } catch (Exception $ex){
               die(); 
            }
            if ($NewID !== $OldID['Identifiant']){
                
            $NewInsert = $bdd->prepare('INSERT INTO Users (Identifiant, Password, Age) VALUES (:Identifiant, :Password, :Age)');
            $NewInsert->bindValue(':Identifiant', $NewID, PDO::PARAM_STR);
            $NewInsert->bindValue(':Password', $cryptedPW, PDO::PARAM_STR);
            $NewInsert->bindValue(':Age', $NewAge, PDO::PARAM_INT);
            $NewInsert->execute();
            echo 'utilisateur bien enregistré';
                
            } else { echo 'identifiant deja existant';}
            
            } else { 
                echo 'champs non remplis';
            }
        }
    }
    public function Connect(){
        include 'bddConnect.php';
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
             if (password_verify($_POST['password'], $donnees['Password'])){
                 $_SESSION['ID'] = $donnees['Identifiant'];
                 $_SESSION['mdp'] = $donnees['Password'];
                 header('Location: filmk.php');
             }else {
                    echo '<p class="col-xs-12">mauvais identifiant ou mot de passe</p>';
                    }
         }else{
          echo'<p class="col-xs-12">Vous avez oublié de remplir un champ.</p>';
             }
    }
}
class Change{
    public function ChFilm(){
        include 'bddConnect.php';
        $infos_films = $bdd->prepare('SELECT * FROM film WHERE titre = ?');
        $infos_films->execute(array($_SESSION['edit_titre']));
        $donnees = $infos_films->fetch(PDo::FETCH_ASSOC);
        return $donnees;
    }
    public function RepFilm(){
        include 'bddConnect.php';
        $filmname = $_SESSION['edit_titre'];
        $filmdate = filter_input(INPUT_POST, 'releaseD',FILTER_SANITIZE_NUMBER_INT);
        $filmreal = filter_input(INPUT_POST, 'filmreal',FILTER_SANITIZE_STRING);       
        $filmactor = filter_input(INPUT_POST, 'acteurs',FILTER_SANITIZE_STRING);
        $filmimage = 'images/'.$filmname.'jpg';
        if (!empty($filmactor) AND !empty($filmdate) AND !empty($filmreal) AND !empty($filmname)){
        $insert = $bdd->prepare('UPDATE film SET realisateur = :realisateur,'
                                    . ' acteurs = :acteurs,'
                                    . 'année = :annee WHERE titre = :titre');  
        $insert->bindValue(':titre', $filmname, PDO::PARAM_STR);
        $insert->bindValue(':realisateur', $filmreal, PDO::PARAM_STR);
        $insert->bindValue(':acteurs', $filmactor, PDO::PARAM_STR);
        $insert->bindValue(':annee', $filmdate, PDO::PARAM_INT); 
        echo 'boo';
        $insert->execute();
        header('Location: filmk.php');
        }
    }
}
?>