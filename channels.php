<?php 
require "connexion_bdd.php";
session_start();
//////////// requete de recuperation de tout les canaux de chat\\\\\\\\\\\

$req = $con->prepare("SELECT * FROM `canaux`");
$req->execute();
$result = $req->fetchAll(PDO::FETCH_ASSOC);

    
    //////// seclection du canal de chat \\\\\\\\\\\\

    if(isset($_POST['chooseCanal'])){
        $choose = $_POST['choose'];
        $_SESSION['channel'] = $choose;
        $sql = $con->prepare("SELECT * FROM `canaux`");
        $sql->execute();
        header("Location:chat.php?=$choose");
    }

    ////////////// retour au profil \\\\\\\\\\\\\\\

    if(isset($_POST['retour'])){
        header("Location:profil.php") ;
    }

    if(isset($_POST['profil'])){
        header("Location:profil.php") ;
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   
    <h1>Little discord choix de channel</h1>

        <!-- ////////// formulaire de choix de channel\\\\\\\\\\\\\\\ -->

        <form action=""  method="POST" class="form_connexion_inscription" style="margin-bottom: 40px;">
        <h2>choisissez votre channel</h2>
        <label>Nom du canal : </label>
            <select name="choose" id="channelSelect">
                <option value="">--choisir un channel--</option>
                <?php foreach ($result as $canal){ ?>
                <option value="<?= $canal['id_c'] ?>"><?= $canal['canal'] ?></option>
                <?php } ;?>
            </select>
        <input type="submit" value="valider" name="chooseCanal">
       

            <!-- ////////// redirection vers profil \\\\\\\\\\\\\\\ -->

    <form action="" method="POST" class="form_connexion_inscription" style="margin-bottom: 40px;">
        <input type="submit" value="accés profil" name="profil">
    </form>

</body>
</html>
