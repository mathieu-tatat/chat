window.addEventListener('DOMContentLoaded',(event)=>{
    let pseudo = document.getElementById('pseudo')
    let email= document.getElementById('email')
    let password= document.getElementById('password')
    let password2= document.getElementById('password2')
    let password3= document.getElementById('password3')
    let p = document.querySelectorAll('.mes')

    let regexLowerCase = /[a-z]{1,}/
    let regexUpperCase = /[A-Z]{1,}/
    let regexNumber = /[0-9]{1,}/
    let regexmail = /[a-z0-9]+@[a-z]+\.[a-z]{2,3}/

    pseudo.addEventListener('keyup',function(){
        
        if(this.value.length < 5){
            p.style.color='red'
            p.innerHTML = "le pseudo doit contenir au moins 5 caractères"
        }else{
            p.innerHTML=""
        }
    
        if(regexLowerCase.test(this.value)== false){
            
        }else if(this.value.length >= 5){
            p.style.color='green'
            p.innerHTML= "pseudo valide"
        
            
        }
})

    
    email.addEventListener('keyup',function(){
        
        if(regexmail.test(this.value)== false){
            p.style.color='red'
            p.innerHTML = "email invalide"
        }else{
            p.innerHTML=""
        }
    
        if(regexmail.test(this.value)== true){
            p.style.color='green'
            p.innerHTML= "email valide"
        }
    })
    password.addEventListener('keyup',function(){
        if(this.value.length < 3 || regexNumber.test(this.value)== false || regexUpperCase.test(this.value)== false || regexLowerCase.test(this.value)== false){
            p.style.color='red'
            p.innerHTML = "veuillez entrer au moins 1 majusculke 1 minuscule et un nombre"
        }
        
        else{
            p.innerHTML=""
        }
    
        if(regexLowerCase.test(this.value)== true && regexNumber.test(this.value)== true && regexUpperCase.test(this.value)==true && this.value.length >= 3){
            p.style.color='green'
            p.innerHTML= "password valide"

    }
    
    })

    password2.addEventListener('keyup',function(){
        
        if(this.value !== password3.value){
            p.style.color='red'
            p.innerHTML = "les mots de passes ne sont pas identiques"
        }
        else{
            p.innerHTML=""
        }

        if(this.value === password.value){
            p.style.color='green'
            p.innerHTML= "confirmation ok "
        }
        
    })

});