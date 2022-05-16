<?php 
    //Connexion à la base de données
  
    $con = new PDO('mysql:host=localhost:3306;dbname=mathieu-tatat_chat;charset=utf8' , 'thechat', 'thechat');
    if(!$con){
          //si la connexion échoue , afficher :
            echo "Connexion échouée";
       }
       

?>
