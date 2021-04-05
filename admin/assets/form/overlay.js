function on1(id) {
    document.getElementById("overlay1").style.display = "block";
    sessionStorage.setItem("patientOverlayID",id);
    sessionStorage.setItem("clickedOverlay",1);
    
    
}

function off1() {
    document.getElementById("overlay1").style.display = "none";
}

function on2() {
    document.getElementById("overlay2").style.display = "block";
}

function off2() {
    document.getElementById("overlay2").style.display = "none";
}

function on3() {
    document.getElementById("overlay3").style.display = "block";
}

function off3() {
    document.getElementById("overlay3").style.display = "none";
}