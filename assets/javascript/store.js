let patients = [];
let admins = [];
let healthcareCentres = [];
let vaccines = [];

var jsObject = {
    name: "Alice",
    country: "Singapore"
}
//hard-coded patient
var patientObj = {
    username: "Samuel",
    password: "patient123",
    email: "sam@gmail.com",
    icPassport: "123456-12-1234"
}

//hard-coded healthcareCentre
var healthcareCentre1 = {
    centreName: "Puchong HealthcareCentre",
    centreAddress: "Puchong, Malaysia",
    batch: []
}

//hard-coded admin
var adminObj = {
    centre: healthcareCentre1,
    username: "Sam",
    password: "patient123",
    email: "sam@gmail.com",
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

export{patients, admins, healthcareCentres, vaccines};