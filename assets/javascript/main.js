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

//hard-coded healthcareCentre to show them in use case 1, 2, 3 and 4
var centre1 = {
    centreName: "University Kebangsaan",
    centreAddress: "Puchong, Malaysia",
    batch: []
}

var centre2 = {
    centreName: "IDCC Shah alam",
    centreAddress: "Puchong, Malaysia",
    batch: []
}

var centre3 = {
    centreName: "Bukit Jalil Stadium",
    centreAddress: "Puchong, Malaysia",
    batch: []
}

var centre4 = {
    centreName: "KLCC 1 & 2",
    centreAddress: "Puchong, Malaysia",
    batch: []
}

//hard-coded admin
var adminObj = {
    healthcareCentre: centre1,
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
healthcareCentres.push(centre1, centre2, centre3, centre4);
vaccines.push(vaccine1, vaccine2, vaccine3);

//patient Sign Up
function patientSignUp(){
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
        alert("Please fill up the sign up form");
    }
}

//admin Sign Up
function adminSignUp(){
    var newAdminObj = new Object();
    newAdminObj.healthcareCentre = document.getElementById('healthcare').value;
    newAdminObj.username = document.getElementById('aUsername').value;
    newAdminObj.password = document.getElementById('aPsw').value;
    newAdminObj.fullname = document.getElementById('aFName').value;
    newAdminObj.email = document.getElementById('aEmail').value;
    newAdminObj.staffID = document.getElementById('inStaffID').value;

    if(newAdminObj.centre!="" && newAdminObj.username !="" && newAdminObj.password !="" && newAdminObj.fullname!="" &&newAdminObj .email!="" && newAdminObj.staffID != ""){
        //store new patient object into patients array
        admins.push(newAdminObj);
        alert("Your account has been saved");
        window.location.replace("login.html");
    }
    else{
        alert("Please fill up the sign up form")
    }
}

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
                    alert("Welcome, " + admins[i].username + " (HealthcareCentre name: " + admins[i].healthcareCentre.centreName + ")");
                    window.location.replace("recordNewVaccineBatch.html");
                }
                else{
                    alert("Your username or password is incorrect, please try again");
                }
            }
        }
    }

    //Generate VaccinationID

    
    (function() {
        function IDGenerator() {
        
            this.length = 8;
            this.timestamp = +new Date;
            
            var _getRandomInt = function( min, max ) {
               return Math.floor( Math.random() * ( max - min + 1 ) ) + min;
            }
            
            this.generate = function() {
                var ts = this.timestamp.toString();
                var parts = ts.split( "" ).reverse();
                var id = "";
                
                for( var i = 0; i < this.length; ++i ) {
                   var index = _getRandomInt( 0, parts.length - 1 );
                   id += parts[index];	 
                }
                
                return id;
            }
   
            
        }
        
        
        document.addEventListener( "DOMContentLoaded", function() {
           var btn = document.querySelector( "#generate" ),
               output = document.querySelector( "#output" );
               
           btn.addEventListener( "click", function() {
               var generator = new IDGenerator();
               output.innerHTML = generator.generate();
               
           }, false); 
            
        });
        
        
    })();
   
   

}

