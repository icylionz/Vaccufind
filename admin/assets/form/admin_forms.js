function forms() {
    document.getElementById('search').style.display = 'none';
    document.getElementById('patient').style.display = 'none';
    document.getElementById('wait').style.display = 'none';
    document.getElementById('notification').style.display = 'none';
    document.getElementById('essential').style.display = 'none';
    document.getElementById('medical').style.display = 'none';
    document.getElementById('vac').style.display = 'none';
}

function searchList() {
    if (document.getElementById('search').style.display == 'none') {
        document.getElementById('default').style.display = 'none';
        document.getElementById('search').style.display = 'block';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
    } else if (document.getElementById('search').style.display == 'block') {
        document.getElementById('default').style.display = 'block';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
    }
}

function patientList() {
    if (document.getElementById('patient').style.display == 'none') {
        document.getElementById('default').style.display = 'none';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'block';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
    } else if (document.getElementById('patient').style.display == 'block') {
        document.getElementById('default').style.display = 'block';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
    }
}

function waitList() {
    if (document.getElementById('wait').style.display == 'none') {
        document.getElementById('default').style.display = 'none';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'block';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
    } else if (document.getElementById('wait').style.display == 'block') {
        document.getElementById('default').style.display = 'block';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';

    }
}

function notificationTable() {
    if (document.getElementById('notification').style.display == 'none') {
        document.getElementById('default').style.display = 'none';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'block';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
    } else if (document.getElementById('notification').style.display == 'block') {
        document.getElementById('default').style.display = 'block';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
    }
}

function essentialForm() {
    if (document.getElementById('essential').style.display == 'none') {
        document.getElementById('default').style.display = 'none';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'block';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
    } else if (document.getElementById('essential').style.display == 'block') {
        document.getElementById('default').style.display = 'block';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
    }
}

function medicalForm() {
    if (document.getElementById('medical').style.display == 'none') {
        document.getElementById('default').style.display = 'none';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'block';
        document.getElementById('vac').style.display = 'none';
    } else if (document.getElementById('medical').style.display == 'block') {
        document.getElementById('default').style.display = 'block';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
    }
}

function vacForm() {
    if (document.getElementById('vac').style.display == 'none') {
        document.getElementById('default').style.display = 'none';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'block';
    } else if (document.getElementById('vac').style.display == 'block') {
        document.getElementById('default').style.display = 'block';
        document.getElementById('search').style.display = 'none';
        document.getElementById('patient').style.display = 'none';
        document.getElementById('wait').style.display = 'none';
        document.getElementById('notification').style.display = 'none';
        document.getElementById('essential').style.display = 'none';
        document.getElementById('medical').style.display = 'none';
        document.getElementById('vac').style.display = 'none';
    }
}