//Navbar Responsive Script
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
} 

//Menambah class input dan button search
document.getElementById('s').className += ' form-control';
document.getElementById('searchsubmit').className += ' btn btn-success';

//Menambah class Input komentar
