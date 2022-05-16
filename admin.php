<?php 
require "connexion_bdd.php";
session_start();

//////////// requete de recuperation de tout les canaux de chat\\\\\\\\\\\
if($_SESSION['user']['id_droit'] == 666){
$req = $con->prepare("SELECT * FROM `canaux`");
$req->execute();
$result = $req->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST['createCanal']) && ($_POST['channel']) != ""){
    
        $channel = $_POST['channel'];
        $user = $_SESSION['user']['id_u'];
            
        //inserer le canal dans la base de données
        $requete = $con->prepare("INSERT INTO canaux VALUES (NULL,'$channel',NOW())");
        $requete->execute();

        //on actualise la page
            if($requete){
            $_SESSION['message'] = "<p class='message_inscription'>le chat a été créer avec succès !</p>" ;
            header('Location:admin.php');
            };
        }
        else {
            // si le message est vide , on actualise la page
           
        }
    
        ///////////// fonctionnalité de supression du canal de chat \\\\\\\\\\\\\\\:

    if(isset($_POST['deletCanal'])){
        $modif = $_POST['modif'];
        $sql = $con->prepare("DELETE FROM `canaux` WHERE `canaux`.`canal` = '$modif'");
        $sql->execute();
        header('Location:admin.php');
        echo "channel supprimé";
        
    }

    //////////// bouton retour au choiix du chat \\\\\\\\\\\

    if(isset($_POST['retour'])){
        header("Location:channels.php") ;
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
    <link rel="icon" href="favicon.png" sizes="16x16" type="image/png">
</head>
<body>
   
    <h1>Little discord espace Administration</h1>


<!-- ////////// formulaire de creation de channel\\\\\\\\\\\\\\\ -->

        <form action=""  method="POST" class="form_connexion_inscription" style="margin-bottom: 40px;">
        <p class="message_error">
            <?php 
               //affichons l'erreur
               if(isset($error)){
                   echo $error ;
               }
            ?>
        </p>
            <h2>Creer un channel</h2> 
            <label>Nom du canal : </label>
            <input type="text" name="channel" placeholder="choisir un nom de channel..".>
            <input type="submit" value="valider" name="createCanal">  
        </form>


        <!-- ////////// formulaire de supression de channel\\\\\\\\\\\\\\\ -->

        <form action=""  method="POST" class="form_connexion_inscription" style="margin-bottom: 40px;">
        <h2>Suprimmer un Channel</h2>
        <label>Nom du canal : </label>
            <select name="modif" id="channelSelect">
                <option value="">--choisir un channel--</option>
                <?php foreach ($result as $canal){ ?>
                <option value="<?= $canal['canal'] ?>"><?= $canal['canal'] ?></option>
                <?php } ?>
            </select>
        <input type="submit" value="valider" name="deletCanal">
        
    </form>
    <form action="" method="POST" class="form_connexion_inscription" style="margin-bottom: 40px;">
    <input type="submit" value="retour au chat" name="retour">
</form>
    <script src="script.js"></script>

</body>

    <?php }else{ ?>

    
            <img style="display: flex;justify-content: center;margin: auto;"src="troll.gif" >
            <h2 style="display: flex;justify-content: center;margin: auto;">Accés refusé</h2>
            <a style= "padding: 5px 20px; color: #fff; background-color: #302f2b; font-size: 13px; text-decoration: 0; border-radius 6px;  display: flex; justify-content: center; width:5%; margin: auto;"  href="index.php">accueil</a>
        
    <?php  } ?>
        
</html>
