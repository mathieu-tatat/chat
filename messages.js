window.addEventListener("DOMContentLoaded", (event) => {

    // On actualise automatique le chat 
    var message_box = document.querySelector('.messages_box');
    setInterval(function(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                message_box.innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("GET","messages.php" , true); // récupération de la page message
        xhttp.send()

        xhttp.onerror = function(error){
            console.error( error );}
        
    },500) // Actualiser le chat tous les 500 ms

    //get the div that contains all the messages
  
    
      
});