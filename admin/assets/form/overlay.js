function on0() {
    document.getElementById("overlay0").style.display = "block";
}

function off0() {
    document.getElementById("overlay0").style.display = "none";
}

function on1() {

    document.getElementById("overlay1").style.display = "block";
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

function showByID() {
    if (document.getElementById("byID").style.display == "none") {
        document.getElementById("byID").style.display = "block";
        document.getElementById("byName").style.display = "none";
    } else if (document.getElementById("byID").style.display = "block") {
        document.getElementById("byID").style.display = "none";
    }
}

function showByName() {
    if (document.getElementById("byName").style.display == "none") {
        document.getElementById("byName").style.display = "block";
        document.getElementById("byID").style.display = "none";
    } else if (document.getElementById("byName").style.display = "block") {
        document.getElementById("byName").style.display = "none";
    }
}