<?php 
require "connexion_bdd.php";
session_start();

//////////// requete de recuperation du profil si id en db  egal a l'id en session \\\\\\\\\\\

    $user = $_SESSION['user'];
    $requete = $con->prepare("SELECT * FROM `utilisateurs` WHERE id_u = {$user['id_u']}");
    $requete ->execute();
    $res = $requete->fetchAll(PDO::FETCH_ASSOC);
    
//////////////////  requete de mise a jour des infos de l'utilisateur \\\\\\\\\\\\\\\

if(isset($_POST['setInfo'])){
    if(isset($_POST['password']) == $user['mdp'] && isset($_POST['password2']) == isset($_POST['password3']) && ($_POST['pseudo'])!="" &&  ($_POST['email'])!=""  &&  ($_POST['password'])!="" &&  ($_POST['password2'])!="" &&  ($_POST['password3'])!="" ){
        
            $data = [
                'pseudo'=>$_POST['pseudo'],
                'email'=>$_POST['email'],
                'mdp'=>$_POST['password2'],
                'id_u'=>$user['id_u'],
                
            ];
            $sql = "UPDATE `utilisateurs` SET pseudo=:pseudo, email=:email, mdp=:mdp WHERE id_u=:id_u";
            $stmt= $con->prepare($sql);
            $stmt->execute($data);

             $_SESSION['message'] = "<p class='message_inscription'>Votre compte a été modifié avec succès !</p>";
            //destruction de toute les sessions
            session_destroy();
            // redirection vers la page de connexion afin d'avoir les modications apportées en session
            header("Location:index.php");
           
        }

    }

///////////////// bouton de retour page channel \\\\\\\\\\\\\\\\\\\\\
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
    <title>profil</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <script src="script2.js"></script>
</head>
<body>
    <h1>Little discord espace profil</h1>

  <!-- formulaire pour modifier ses infos -->

    <form action=""  method="POST" class="form_connexion_inscription">
        <h2>profil: <?= $user['pseudo'] ?></h2>
        <h5>modifier vos informations:</h5>
        <p class="mes"></p>
        <label>Pseudo:</label>
        <input type="text" name="pseudo" id="pseudo"placeholder=<?= $user['pseudo'] ?>>
        <label>Adresse Mail:</label>
        <input type="email" name="email" id="email"placeholder=<?= $user['email'] ?>>
        <label>Mot de passe actuel:</label>
        <input type="password" name="password" id= "password" placeholder="Entrer votre mot de passe actuel..">
        <label>Nouveau mot de passe:</label>
        <input type="password" name="password2" id= "password2" placeholder="Entrer votre nouveau mot de passe..">
        <label>Confirmation du mot de passe:</label>
        <input type="password" name="password3" id= "password3" placeholder="confirmation du mot de passe..">
        <input type="submit" value="soumettre" name="setInfo">
        <p class="link" style="color:white;">Vous serez deconnecté afin de valider vos modifications</p>
        <input type="submit" value="retour au chat" name="retour">   
     </form>
  
    <script src="script.js"></script>
</body>
</html>