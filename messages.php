              
            <?php 
            session_start();
            if(isset($_SESSION['user'])){// si l'utilisateur s'est connecté
               //connexion à la abse de donnée
               include "connexion_bdd.php";
               //requete pour afficher les messages
               $id_c = $_SESSION['channel'];
               
               $req = $con->prepare("SELECT * FROM messages WHERE id_channel = '$id_c'ORDER BY id_m ASC");
               $req->execute();
               $res = $req->fetch(PDO::FETCH_ASSOC);
            
            
               if($req->rowCount() <= 0){
                   // s'il n'y a pas encore de message
                   echo "Messagerie vide";
               }else {
                   //si oui
                   while($row = $req->fetch(PDO::FETCH_ASSOC)){

                   
                       //si c'est vous qui avvez envoyé le mesage on utilise ce format :
                        if($row['id_user'] == $_SESSION['user']['id_u']){
                            ?>
                                <div class="message your_message">
                                    <span>Vous :</span>
                                    <p><?=$row['msg']?></p>
                                    <p class="date"><?=$row['date']?></p>
                                </div>
                            <?php
                        }else {
                            //si vous n'êtes pas l'auteur du message , on affiche ce message sur ce format :
                                ?>
                                     <div class="message others_message">
                                        <span><?=$row['pseudo']?>:</span>
                                        <p><?=$row['msg']?> </p>
                                        <p class="date"><?=$row['date']?></p>
                                    </div>
                                <?php
                        }
                   } 
               }
            }
            
            ?>

              
              
              
              
             
               
