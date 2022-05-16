
document.addEventListener("DOMContentLoaded", (event) => {
   

      //confirmation du mot de passe
      //Vérifions si le mot de passe et la confirmation sont conformes
      var mdp1 = document.querySelector('.mdp1');
      var mdp2 = document.querySelector('.mdp2');
      var password = document.querySelector('.password');
      var password2 = document.querySelector('.password2');
      var password3 = document.querySelector('.password3');
      mdp2.addEventListener('keyup',function(){
    //   mdp2.onkeyup = function(){
         //évenement lorsqu'on écrit dans le champs : confirmation du mot de passe
         message_error = document.querySelector('.message_error');
         if(mdp1.value != mdp2.value){ //s'ils ne sont pas égaux
            //On affiche un message d'erreur
            message_error.innerText = "Les Mots de passes ne sont pas conformes";
         }else {//si non
            //On écrit rien dans message_error
            message_error.innerText=""
         }


      })

      password2.addEventListener('keyup',function(){
        //   mdp2.onkeyup = function(){
             //évenement lorsqu'on écrit dans le champs : confirmation du mot de passe
             message_error = document.querySelector('.message_error');
             if(password2.value != password3.value){ //s'ils ne sont pas égaux
                //On affiche un message d'erreur
                message_error.innerText = "Les Mots de passes ne sont pas identiques";
             }else {//si non
                //On écrit rien dans message_error
                message_error.innerText=""
             }
    
    
          })
    


  
    });

    window.addEventListener("DOMContentLoaded", (event) => {

        // On actualise automatique le chat 
        var message_box = document.querySelector('.messages_box');
        setInterval(function(){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    message_box.innerHTML = this.responseText;
                }
            };
            xhttp.open("GET","messages.php" , true); // récupération de la page message
            xhttp.send()
        },500) // Actualiser le chat tous les 500 ms

        //get the div that contains all the messages
      
        
          
});
