/*
*
* Han Vui Ern Samuel
*
*/

//collections 
let patients = [];
let admins = [];
let healthcareCentres = [];
let vaccines = [];
let batches = [];

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
    centreName: "Queens",
    centreAddress: "Puchong, Malaysia",
    vaccineBatches: []
}

var centre2 = {
    centreName: "IDCC Shah alam",
    centreAddress: "Puchong, Malaysia",
    vaccineBatches: []
}

var centre3 = {
    centreName: "Bukit Jalil Stadium",
    centreAddress: "Puchong, Malaysia",
    vaccineBatches: []
}

var centre4 = {
    centreName: "KLCC 1 & 2",
    centreAddress: "Puchong, Malaysia",
    vaccineBatches: []
}

//hard-coded admin
var adminObj = {
    //store centre1 object in adminObj
    healthcareCentre: centre1,
    username: "Han",
    password: "admin123",
    email: "hanAdmin@gmail.com",
    fullName: "Han Vui Ern Samuel",
    staffID:"admin01"
}

//hard-coded vaccines
var vaccine1 = {
    //store vaccineBatches array in vaccine object
    batches: [],
    vacName: "Pfizer",
    manufacturer: "PfizerManufacture"
    
}

var vaccine2 = {
    //store vaccineBatches array in vaccine object
    batches: [],
    vacName: "Astrazenaca",
    manufacturer: "AstrazenacaManufacture"
}

var vaccine3 = {
    //store vaccineBatches array in vaccine object
    batches: [],
    vacName: "Sinovac",
    manufacturer: "SinovacManufacture"
}

//hard-coded vaccine batches
var batch1 = {
    //store vaccinations array in vaccine object
    vaccination: [],
    batchNo: "BatchNo01",
    vacName: "Pfizer",
    pendingAppointment: 3,
    exDate: "18/10/2021",
    quantityAv: 20,
    quantityPending: 3,
    quantityAd: 0
}

var batch2 = {
    //store vaccinations array in vaccine object
    vaccination: [],
    batchNo: "BatchNo02",
    vacName: "Sinovac",
    pendingAppointment: 10,
    exDate: "20/10/2021",
    quantityAv: 40, 
    quantityPending: 10,
    quantityAd: 0
}

var batch3 = {
    //store vaccinations array in vaccine object
    vaccination: [],
    batchNo: "BatchNo03",
    vacName: "Astrazenaca",
    pendingAppointment: 2,
    exDate: "30/10/2021",
    quantityAv: 60,
    quantityPending: 2,
    quantityAd: 0
}

//store all variables in its array respectively
patients.push(patientObj);
admins.push(adminObj);
healthcareCentres.push(centre1, centre2, centre3, centre4);
vaccines.push(vaccine1, vaccine2, vaccine3);
batches.push(batch1, batch2, batch3);

//hard-coded to show healthcare centre name in admin page after logging in
let currentAdmin = adminObj;

//patient Sign Up
function patientSignUp(){
    var newPatientObj = new Object();
    newPatientObj.username = document.getElementById('username').value;
    newPatientObj.password = document.getElementById('psw').value;
    newPatientObj.fullname = document.getElementById('fullname').value;
    newPatientObj.email = document.getElementById('email').value;
    newPatientObj.icPassport = document.getElementById('Passport/IC').value

    if(newPatientObj.username !="" && newPatientObj.password !="" && newPatientObj.fullname!="" 
        && newPatientObj.email!="" && newPatientObj.icPassport!="" ){
        //store new patient object into patients array
        patients.push(newPatientObj);
        alert("You have successfully signed up your account");
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

    if(newAdminObj.centre!="" && newAdminObj.username !="" && newAdminObj.password !="" 
        && newAdminObj.fullname!="" &&newAdminObj .email!="" && newAdminObj.staffID != ""){
        //store new admin object into admins array
        admins.push(newAdminObj);
        alert("You have successfully signed up your account");
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

    for(var i=0; i< patients.length; i++){
        if(patients[i].username == inUsername && patients[i].password == inPassword){
            alert("Welcome, " + patients[i].username);           
            window.location.replace("requestVaccinationAppointment.php");
        }
        else{
            for(var i=0; i< admins.length; i++){
                if(admins[i].username == inUsername && admins[i].password == inPassword){
                    alert("Welcome, " + admins[i].username + " (HealthcareCentre name: " + admins[i].healthcareCentre.centreName + ")");
                    currentAdmin = admins[i];
                    window.location.replace("../recordNewVaccineBatch.php");
                }
                else{
                    alert("Your username or password is incorrect, please try again");
                }
            }
        }
    }
}
//record new vaccine batch
function recordVaccineBatch(){
    let vaccineBatch = new Object();
    vaccineBatch.selectedVaccine = "";
    if (document.getElementById('rad1').checked) {
        vaccineBatch.selectedVaccine = document.getElementById('rad1').value;
        } 
    if (document.getElementById('rad2').checked) {
        vaccineBatch.selectedVaccine = document.getElementById('rad2').value;
    } 
    if (document.getElementById('rad3').checked) {
        vaccineBatch.selectedVaccine = document.getElementById('rad3').value;
    } 
    
    vaccineBatch.batchNo = document.getElementById('batchNo').value;
    vaccineBatch.exDate = document.getElementById('exDate').value;
    vaccineBatch.quantityAv = document.getElementById('quantityAv').value;

    //validate input
    if(vaccineBatch.selectedVaccine!="" && vaccineBatch.batchNo != "" 
        && vaccineBatch.exDate != "" && vaccineBatch.quantityAv){
        for(var i=0; i<vaccines.length; i++){
            //retrieve vaccine object which is same vaccine name as vaccineBatch.selectedVaccine
            if(vaccines[i].vacName == vaccineBatch.selectedVaccine){
                //add created vaccineBatch object into batches array in the vaccine object
                vaccines[i].batches.push(vaccineBatch);
                //add created vaccineBatch object into batches array in the current admin's healthcare centre object
                currentAdmin.healthcareCentre.vaccineBatches.push(vaccineBatch);
                alert("You have successfully recorded a vaccine batch!")
                //reset the form 
                document.getElementById("rvbi").reset();
                return;
            }
        }
    }
    alert("Please fill up the record vaccine batch form")
}

/*
*
*
* Parnia Sakhaei
* 
* 
*/
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




