//calling out all arrays created in store.js
import * as PCVS from './store.js';
const patients = PCVS.patients;
const admins = PCVS.admins;
const form = document.getElementById('login')
var healthcareCentreName = "";
var patientFullName = "";

///when users press button "Login"
form.addEventListener('submit', login);

function login(event){
    event.preventDefault();
    var inUsername = document.getElementById('inUsername').value;
    var inPassword = document.getElementById('inPassword').value;
    
    for(var i=0; i<= patients.length; i++){
        if(patients[i].username == inUsername && patients[i].password == inPassword){
            alert("Welcome, " + PCVS.patients[i].username);
            patientFullName = PCVS.patients[i].fullName;
            window.location.href = "RequestVaccinationAppointment.html";
        }
        
        else{
            for(var i=0; i<= admins.length; i++){
                if(admins[i].username == inUsername && admins[i].password == inPassword){
                    alert("Welcome, " + admins[i].username + " (HealthcareCentre name: " + admins[i].centre.centreName + ")");
                    healthcareCentreName = admins[i].centreName;
                    window.location.href = "recordNewVaccineBatch.html";
                }
                else{
                    alert("Your username or password is incorrect, please try again");
                    
                }
            }
        }
    } 
}
export{patientFullName, healthcareCentreName};
    