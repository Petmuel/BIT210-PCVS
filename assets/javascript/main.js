//collections 
let patients = [];
let admins = [];
let healthcareCentres = [];
let vaccines = [];

//hard-coded patient
var patientObj = {
    username: "Samuel",
    password: "patient123",
    fullName: "Han Vui Ern Samuel",
    email: "sam@gmail.com",
    icPassport: "123456-12-1234"
}

//hard-coded healthcareCentre
var healthcareCentre1 = {
    centreName: "PuchongHealth Centre",
    centreAddress: "Puchong, Malaysia",
    batch: []
}

//hard-coded admin
var adminObj = {
    centre: healthcareCentre1,
    username: "Han",
    password: "admin123",
    email: "hanAdmin@gmail.com",
    staffID:"admin01"
}

//hard-coded vaccines
var vaccine1 = {
    vacName: "Pfizer",
    manufacturer: "PfizerManufacture",
    batch: []
}

var vaccine2 = {
    vacName: "Astrazenaca",
    manufacturer: "AstrazenacaManufacture",
    batch: []
}

var vaccine3 = {
    vacName: "Sinovac",
    manufacturer: "SinovacManufacture",
    batch: []
}

patients.push(patientObj);
admins.push(adminObj);
healthcareCentres.push(healthcareCentre1);
vaccines.push(vaccine1, vaccine2, vaccine3);

//patient Sign Up
function signUp(){
    var newPatientObj = new Object();
    newPatientObj.username = document.getElementById('username').value;
    newPatientObj.password = document.getElementById('psw').value;
    newPatientObj.fullname = document.getElementById('fullname').value;
    newPatientObj.email = document.getElementById('email').value;
    newPatientObj.icPassport = document.getElementById('Passport/IC').value

    if(newPatientObj.username !="" && newPatientObj.password !="" && newPatientObj.fullname!="" && newPatientObj.email!="" && newPatientObj.icPassport!="" ){
        //store new patient object into patients array
        patients.push(newPatientObj);
        alert("Your account has been saved");
        window.location.replace("login.html");
    }
    else{
        alert("Please fill up the sign up form")
    }
}

//admin Sign Up


//Users login
function login(){
    var inUsername = document.getElementById('inUsername').value;
    var inPassword = document.getElementById('inPassword').value;
    
    if (inUsername==""){
        alert("Please enter username");
        return false;
      }
    
      if (inPassword==""){
        alert("Please enter password");
        return false;
      }

    for(var i=0; i<= patients.length; i++){
        if(patients[i].username == inUsername && patients[i].password == inPassword){
            alert("Welcome, " + patients[i].username);
            window.location.replace("RequestVaccinationAppointment.html");
        }
        else{
            for(var i=0; i<= admins.length; i++){
                if(admins[i].username == inUsername && admins[i].password == inPassword){
                    alert("Welcome, " + admins[i].username + " (HealthcareCentre name: " + admins[i].centre.centreName + ")");
                    window.location.replace("recordNewVaccineBatch.html");
                }
                else{
                    alert("Your username or password is incorrect, please try again");
                }
            }
        }
    }
}

