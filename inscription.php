<?php 
  //démarer la session
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Chat</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <script src="messages.js"></script>
</head>

<body>
     <?php
      
        if(isset($_POST['button_inscription'])){
           //si le formulaire est envoyé
           //se connecter à la base de donnée
           include "connexion_bdd.php";
           //extraire les infos du formulaire
           extract($_POST);
           //verifions si les champs sont vides
           if(isset($pseudo) && $pseudo!="" && isset($email) && isset($mdp1) && $email != "" && $mdp1 != "" && isset($mdp2) && $mdp2 != ""  ){
               //verifions que les mots de passes sont conforme
               if($mdp2 != $mdp1){
                   // s'ils sont differrent
                   $error = "Les Mots de passes sont différents !";
               }else {
                   //si non , verifions si l'email existe

                   $req = $con->prepare("SELECT * FROM utilisateurs WHERE pseudo = '$pseudo' AND email = '$email' AND mdp = '$mdp1'");
                   $req->execute();
                   $req->rowCount();

                   $req = $con->prepare("SELECT * FROM utilisateurs WHERE email = '$email'");
                   if($req->rowCount() == 0 && $req->rowCount() == 0){
                       //si ça n'existe pas , créons le compte
                       $req = $con->prepare("INSERT INTO utilisateurs VALUES (NULL, '$pseudo','$email' , '$mdp1',1) ");
                       $req->execute();
                       if($req){
                           // si le compte a été créer , créons une variable pour afficher un message dans la page de
                           //connexion
                           $_SESSION['message'] = "<p class='message_inscription'>Votre compte a été créer avec succès !</p>" ;
                           //redirection vers la page de connexion
                           header("Location:index.php") ;
                      
                       }
                       else {
                           //si non
                           $error = "Inscription Echouée !";
                       }
                       
                   }else {
                       //si ça existe
                       $error = "Email ou Pseudo existent déjà !";
                   }

               }
           }else {
               $error = "Veuillez remplir tous les champs !" ;
           }
        }
     ?>
    <h1>Bienvenue sur little discord</h1>
      <form action="" method="POST" class="form_connexion_inscription" >
        <h2>INSCRIPTION</h2>
        
        <p class="message_error">
            <?php 
               //affichons l'erreur
               if(isset($error)){
                   echo $error ;
               }
            ?>
        </p>
        <label>Pseudo:</label>
        <input type="text" name="pseudo" placeholder="Entrer un pseudo...">
        <label>Adresse Mail:</label>
        <input type="email" name="email" placeholder="Entrer votre adresse email...">
        <label>Mots de passe:</label>
        <input type="password" name="mdp1" class="mdp1" placeholder="Entrer un Mot de passe...">
        <label>Confirmation Mots de passe:</label>
        <input type="password" name="mdp2" class="mdp2" placeholder="confirmer votre mot de passe...">
        <input type="submit" value="Inscription" name="button_inscription">
        <p class="link">Vous avez un compte ? <a href="index.php">Se connecter</a></p>
    </form>
   
   
    
</body>
</html>