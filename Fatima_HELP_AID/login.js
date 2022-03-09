console.log(users);
let users = [{
    "name": "Sarah",
    "password": "sarah",
},
{   "name":"Selina",
    "password":"selina"
}]
let login = (ev)=>{

        ev.preventDefault();//to prevent default event

        const user = document.querySelector("#username").value.trim();
        const password = document.querySelector("#password").value;
        const successMessage = "Login successful";
        const failureMessage = "Login failed";

        function successful(){
            setTimeout(function(){
                window.location.href="addApplicant.html";
            }, 2000);
            alert(successMessage);
        }
    
        for(let i = 0 ; i<users.length; i++){
            if(user===(users)[i].name && password===(users)[i].password){
                successful();
                return
            }
        }
        alert(failureMessage);
    }
    document.forms[0].reset();
    //save data to localStorage
   //localStorage.setItem("name-of-key", JSON.stringify(name-of-obj/arr) ); */
   document.addEventListener("DOMContentLoaded", () =>{
        document.querySelector(".button").addEventListener("click", login)
    });