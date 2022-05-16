
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
</head>
<body>
    <?php 
       if(isset($_POST['button_con'])){
           //si le formulaire est envoyé
           //se connecter à la base de donnée
           include "connexion_bdd.php";
           //extraire les infos du formulaire
           extract($_POST);
           //verifions si les champs sont vides
           if(isset($email) && isset($mdp1) && $email != "" && $mdp1 != ""){
               //verifions si les identifiants sont justes
               $req = $con->prepare("SELECT * FROM utilisateurs WHERE pseudo = '$pseudo' AND email = '$email' AND mdp = '$mdp1'");
               $req->execute();
               $user = $req->fetch(PDO::FETCH_ASSOC);
               $req->rowCount();
              

               if($req->rowCount() > 0){
                   //si les ids sont justes
                   //Création d'une session qui contient l'email
                   $_SESSION['user'] = $user ;
                   //redirection vesr la page chat
                    header("location:channels.php");
                   // detruire la variable du message d'inscription
                   unset($_SESSION['message']);
               }else {
                   //si non
                   $error = "Erreur de connexion verifiez vos identifiants!";
               }
           }else {
               //si les champs sont vides
               $error = "Veuillez remplir tous les champs !" ;
           }
       }
    ?>
    <h1>Bienvenue sur little discord</h1>
    <p class="accueil">Sur cette plateforme vous aurez accés à differents canaux de chat dans lesquels vous pourrez dialoguer en oute liberté</p>
    <form action=""  method="POST" class="form_connexion_inscription">
        <h2>CONNEXION</h2>
        <?php
           //affichons le message qui dit qu'un compte a été créer
           if(isset($_SESSION['message'])){
               echo $_SESSION['message'] ;
           }
        ?>
        <p class="message_error">
            <?php 
               //affichons l'erreur
               if(isset($error)){
                   echo $error ;
               }

            ?>
        </p>
        <label>Pseudo:</label>
        <input type="text" name="pseudo" placeholder="Entrer votre pseudo...">
        <label>Adresse Mail:</label>
        <input type="email" name="email" placeholder="Entrer votre email...">
        <label>Mots de passe:</label>
        <input type="password" name="mdp1" placeholder="Entrer votre mot de passe...">
        <input type="submit" value="Connexion" name="button_con">
        <p class="link">Vous n'avez pas de compte ? <a href="inscription.php">Créer un compte</a></p> 
        <a href="https://github.com/mathieu-tatat/chat"><img src="logoGithub.svg" alt=""></a>
    </form>
  
</body>
</html>