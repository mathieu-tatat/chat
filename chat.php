<?php 
require "connexion_bdd.php";
  //démarer la session
  session_start();
  if(!isset($_SESSION['user'])){
      // si l'utilisateur n'est pas connecté
     // redirection vers la page de connexion
     header("location:index.php");
  }
  $pseudo = $_SESSION['user']['pseudo']; // pseudo de l'utilisateur
  $channelId = $_SESSION['channel'];// id du cannal
  $userId = $_SESSION['user']['id_u'];

  $requete = $con->prepare("SELECT * FROM `utilisateurs`");
  $requete ->execute();
  $res = $requete->fetch(PDO::FETCH_ASSOC);

  $req = $con->prepare("SELECT * FROM `canaux` WHERE id_c = '$channelId'");
  $req->execute();
  $result = $req->fetch(PDO::FETCH_ASSOC);
  $user = $_SESSION['user'];
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?=$user['pseudo']?> | CHAT</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <script src="messages.js"></script>
</head>
<body>
    
<h1>little discord</h1>

    <div class="chat">
        <div class="button-email">
            <span> canal: <?=$result['canal'] ?> </br>  User: <?=$user['pseudo']?></span>
            
        <?php  
       ////////////: condition si id droit est egale a 666 affichage bouton admin sinon id droit egale 1 affichage bouton profil
            if(isset($user)){
                if(isset($user['id_u'])){
                    if($user['id_droit']==666){
                            echo "<a href='admin.php' class='Deconnexion_btn'> Admin </a>";
                            }
                        else{
                        echo "<a href='profil.php' class='Deconnexion_btn'> Profil </a>";
                        }
                    }
                } 
        ?>
            <a href='channels.php' class='Deconnexion_btn'> channels </a>
            <a href="deconnexion.php" class="Deconnexion_btn">Déconnexion</a>
        </div>
        
    <!-- messages -->
        <div id='messages' class="messages_box"> Chargement ...</div>
        <!-- Fin messages -->
           
                <?php 
                //envoi des messages
                if(isset($_POST['send'])){
                    // recuperons le message
                    $message = $_POST['message']; 
                    //connexion à la base de donnée
                    include("connexion_bdd.php");
                    //verifions si le champs n'est pas vide
                    if(isset($message) && $message != ""){
                        //inserer le message dans la base de données
                            $req = $con->prepare("INSERT INTO messages VALUES (NULL,'$pseudo','$message','$channelId',$userId,NOW())");
                            $req->execute();
                    
                        //on actualise la page
                        header('Location:chat.php');
                    }else {
                        // si le message est vide , on actualise la page
                        header('Location:chat.php');
                    }
                    
                }

               
                ?>
     
            <form action= "" class="send_message" method="POST">
                <textarea name="message" cols="30" rows="2" placeholder="Votre message..."></textarea>
                <input type="submit" value="Envoyer" name="send">
            
            </form>

       
        </div>
    


</body>
</html>