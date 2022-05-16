<?php 
    //Connexion à la base de données
  
    $con = new PDO('mysql:host=localhost;dbname=chat;charset=utf8' , 'root', 'root');
    if(!$con){
          //si la connexion échoue , afficher :
            echo "Connexion échouée";
       }
       

?>
