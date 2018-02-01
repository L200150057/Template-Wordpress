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

function addFields(){
	var a = document.createElement('a');
	var linkText = document.createTextNode("my title text");
	a.appendChild(linkText);
	a.title = "my title text";
	a.href = "http://example.com";
	document.body.appendChild(a);
}

//Membuat img menjadi responsive
$("img").addClass("img-fluid");