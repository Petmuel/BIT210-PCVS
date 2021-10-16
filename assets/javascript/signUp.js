//calling out all arrays created in store.js
import * as PCVS from './store.js';
const form = document.getElementById('suForm')

form.addEventListener('submit', signUp);

function signUp(event){
    event.preventDefault();
    var newPatientObj = new Object();
    newPatientObj.username = document.getElementById('username').value;
    newPatientObj.password = document.getElementById('psw').value;
    newPatientObj.fullname = document.getElementById('fullname').value;
    newPatientObj.email = document.getElementById('email').value;
    newPatientObj.icPassport = document.getElementById('Passport/IC').value

    alert("Your account has been saved");

    //store new patient object into patients array
    PCVS.patients.push(newPatientObj);
    console.log(PCVS.patients);
    
    window.location.href = "login.html";
}

