
function register() {
    var x = document.getElementById("register");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function logout(){
	alert("Su sesion se cerrara.");
	location.href="Index.php";
}